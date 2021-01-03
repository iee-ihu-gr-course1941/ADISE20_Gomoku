<?php

function show_users() {
	global $mysqli;
	$sql = 'select count(*) as p from players where username is not null';
	$st = $mysqli->prepare($sql);
	$st->execute();
	$res = $st->get_result();
	$players = $res->fetch_assoc()['p'];
	return($players);
	//header('Content-type: application/json');
	//print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}
function show_user($b) {
	global $mysqli;
	$sql = 'select username,piece_color from players where piece_color=?';
	$st = $mysqli->prepare($sql);
	$st->bind_param('s',$b);
	$st->execute();
	$res = $st->get_result();
	header('Content-type: application/json');
	print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}	

function set_user($b,$input) {
	//print_r($input);
	if(!isset($input['username'])) {
		header("HTTP/1.1 400 Bad Request");
		print json_encode(['errormesg'=>"No username given."]);
		exit;
	}
	$username=$input['username'];
	$piece_color = $input['piece_color'];
	global $mysqli;
	$sql = 'select count(*) as c from players where username=?';
	$st = $mysqli->prepare($sql);
	$st->bind_param('s',$username);
	$st->execute();
	$res = $st->get_result();
	$r = $res->fetch_all(MYSQLI_ASSOC);
	if($r[0]['c']>0) {
		header("HTTP/1.1 400 Bad Request");
		print json_encode(['errormesg'=>"This username is already set. Please select another username."]);
		exit;
	}

	$sql2 = 'select count(*) as c from players where piece_color=? and username is not null';
    $st2 = $mysqli->prepare($sql2);
    $st2->bind_param('s', $piece_color);
    $st2->execute();
    $res2 = $st2->get_result();
    $r2 = $res2->fetch_all(MYSQLI_ASSOC);
    if ($r2[0]['c'] > 0) {
        header("HTTP/1.1 400 Bad Request");
        print json_encode(['errormesg' => "This color is already in use. Please select another."]);
        exit;
    }

	$sql = 'update players set username=?, token=md5(CONCAT( ?, NOW()))  where piece_color=?';
	$st2 = $mysqli->prepare($sql);
	$st2->bind_param('sss',$username,$username,$piece_color);
	$st2->execute();


	
	update_game_status();
	$sql = 'select * from players where piece_color=?';
	$st = $mysqli->prepare($sql);
	$st->bind_param('s',$b);
	$st->execute();
	$res = $st->get_result();
	header('Content-type: application/json');
	print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
	
	
}

function handle_user($method, $b,$input) {
	if($method=='GET') {
		show_user($b);
	} else if($method=='PUT') {
        set_user($b,$input);
    }
}

function current_color($token) {
	
	global $mysqli;
	if($token==null) {return(null);}
	$sql = 'select * from players where token=?';
	$st = $mysqli->prepare($sql);
	$st->bind_param('s',$token);
	$st->execute();
	$res = $st->get_result();
	if($row=$res->fetch_assoc()) {
		return($row['piece_color']);
	}
	return(null);
}
?>
