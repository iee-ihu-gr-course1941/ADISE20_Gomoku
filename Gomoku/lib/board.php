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


//NEED TO BE ADJUSTED
function do_move($x,$y,$x2,$y2) {
	global $mysqli;
	$sql = 'call `piece_move`(?,?,?,?);';
	$st = $mysqli->prepare($sql);
	$st->bind_param('iiii',$x,$y,$x2,$y2 );
	$st->execute();

	header('Content-type: application/json');
	print json_encode(read_board(), JSON_PRETTY_PRINT);
}
?>

