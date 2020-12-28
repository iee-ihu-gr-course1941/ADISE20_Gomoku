<?php

function show_users() {
	global $mysqli;
	$sql = 'select username,piece_color from players';
	$st = $mysqli->prepare($sql);
	$st->execute();
	$res = $st->get_result();
	header('Content-type: application/json');
	print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
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
	
	/*function show_player($pawn_color)
{
    global $mysqli;
    $sql = 'select nickname,pawn_color,token from players where pawn_color=?';
    $st = $mysqli->prepare($sql);
    $st->bind_param('s', $pawn_color);
    $st->execute();
    $res = $st->get_result();
    header('Content-type: application/json');
    print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}/*


