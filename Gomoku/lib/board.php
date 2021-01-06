<?php
function show_piece($x,$y) {
	global $mysqli;
	
	$sql = 'select * from board where x=? and y=?';
	$st = $mysqli->prepare($sql);
	$st->bind_param('ii',$x,$y);
	$st->execute();
	$res = $st->get_result();
	header('Content-type: application/json');
	print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}

function show_board() {
		header('Content-type: application/json');
		print json_encode(read_board(), JSON_PRETTY_PRINT);
	}

    function reset_board() {
        global $mysqli;
        $sql = 'call clean_board()'; 
        $mysqli->query($sql);
    }
   
    function read_board() {
        global $mysqli;
        $sql = 'select * from board';
        $st = $mysqli->prepare($sql);
        $st->execute();
        $res = $st->get_result();
        return($res->fetch_all(MYSQLI_ASSOC));
    }

    function piece_move($input) {
        $token = input['token'];
        if($token==null || $token=='') {
            header("HTTP/1.1 400 Bad Request");
            print json_encode(['errormesg'=>"Token is not set."]);
            exit;
        }
    
        $player_id = current_player($token);
        if($player_id==null) {
            header("HTTP/1.1 400 Bad Request");
            print json_encode(['errormesg'=>"You are not a player of this game."]);
            exit;
        }
    
        $status = read_status();
        if($status['status']!='started') {
            header("HTTP/1.1 400 Bad Request");
            print json_encode(['errormesg'=>"Game is not in action."]);
            exit;
        }

       /* if($status['p_turn']!=$player_id) {
            header("HTTP/1.1 400 Bad Request");
            print json_encode(['errormesg'=>"It is not your turn."]);
            exit;
        }*/
        //$row_id = $x;
        //$col_id = $y;
        do_move($input);
    }
    function do_move($input){
        $x=$input['x'];
        $y=$input['y'];
        $piece_color = input['piece_color'];
        global $mysqli;
		$sql = 'call `move_piece`(?,?,?);';
		$st = $mysqli->prepare($sql);
		$st->bind_param('iii', $x, $y,$piece_color);
		$st->execute();

		header('Content-type: application/json');
		print json_encode(read_board(), JSON_PRETTY_PRINT);
    }
?>