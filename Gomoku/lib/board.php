<?php

function show_board($input) {
	//global $mysqli;
	
	//$b=current_color($input['token']);
	//if($b) {
	//	show_board_by_player($b);
	//} else {
		header('Content-type: application/json');
		print json_encode(read_board(), JSON_PRETTY_PRINT);
	}
}

function reset_board() {
	global $mysqli;
	$sql = 'call clean_board()';  //$sql = 'CALL `clear_game`()';
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

function convert_board(&$first_board)
{
    $board = [];
    foreach ($first_board as $i => &$row) {
        $board[$row['x']][$row['y']] = &$row;
    }
    return ($board);
}

//NEED TO BE ADJUSTED
function do_move($input)
{
	$token = $input['token'];
	if ($token == null || $token == '') {
		header("HTTP/1.1 400 Bad Request");
		print json_encode(['errormesg' => "token is not set."]);
		exit;
	} else {

		$col_num = $input['move'];
		$pawn_color = $input['pawn_color'];
		global $mysqli;
		$sql = 'call `do_move`(?,?);';
		$st = $mysqli->prepare($sql);
		$st->bind_param('is', $col_num, $pawn_color);
		$st->execute();

		header('Content-type: application/json');
		print json_encode(read_board(), JSON_PRETTY_PRINT);
	}
}
?>

