var me = {token:null, piece_color:null};
var game_status ={};
var timer = null;

$(function () {
	draw_empty_board();
	$('#colrow').hide();
//	fill_board();
	$('#img1').hide();
	$('#img2').hide();
	$('#login').click( login_to_game);
	$('#gomoku_reset').click( reset_board);
	$('#play').click( do_move);
	update_game_status();
});

function draw_empty_board() {
    var board = '<table id="gomoku_board">';
    for (var i = 1; i < 16; i++) {
        board += '<tr>';
        for (var j = 1; j < 16; j++) {
            board += '<td class="board_square" id="square_' + i + '_' + j + '">' + '</td>';
        }
        board += '</tr>';
    }
    board += '</table>'

    $('#board').html(board);
    
  /*  for (var i = 1; i < 16; i++){
   	 for (var j = 1; j < 16; j++) {
        var intersection='<div class="gmk_intersection" id="intersection_${x}_${y}"></div>';

    */
}

function fill_board() {
	$.ajax({url: "gomoku.php/board/", 
		headers: {"X-Token": me.token},
		success: fill_board_by_data });
}

function fill_board_by_data(data) {
//	board=data;
	for(var i=0;i<data.length;i++) {
		var s = data[i];
		var id = '#square_'+ s.x +'_' + s.y;
		if (s.piece_color == 'B') {
			$(id).css('background-image', 'url("../images/black.png")');
		//	$(id).css('background-color', 'black');  - checking if it works
        }
        if (s.piece_color == 'W') {
			$(id).css('background-image', 'url("../images/white.png")');
			//$(id).css('background-color', 'white');
        }

	}
}

function login_to_game() {
    if ($('#username').val() == '') {
        alert('You have to set a username!');
        return;
  }
	var p_color = $('#piece_color').val();

	$.ajax({url: "gomoku.php/players/"+p_color, 
			method: 'PUT',
			dataType: 'json',
			headers: {"X-Token": me.token},
			contentType: 'application/json',
			data: JSON.stringify( {username: $('#username').val(), piece_color:p_color}),
			success: login_result,
			error: login_error});
}

function reset_board() {
	$.ajax({url: "gomoku.php/board/", 
	headers: {"X-Token": me.token}, 
	method: 'POST',  
	success: fill_board_by_data });
	//$('#move_div').hide();
	$('#game_initializer').show(2000);
	$('#username').val("");
    $('#game_info').empty();
    me = { nickname: null, token: null, piece_color: null };
    update_game_status();
	
}	

function update_game_status() {
	clearTimeout(timer);
	$.ajax({url: "gomoku.php/status/",
	headers: {"X-Token": me.token}, 
	success: update_status});
}

function update_status(data) {
	last_update=new Date().getTime();
	var old_stats = game_status;
	game_status=data[0];
	update_player_info();
	clearTimeout(timer);

	if (game_status.status == 'aborted') {
        $('#colrow').hide(1000);
		timer = setTimeout(function() { update_game_status(); }, 4000);
	} else if (game_status.status == 'ended') {
        $('#colrow').hide(1000);
        timer = setTimeout(function() { update_game_status(); }, 2000);
    } 	else {

	if(game_status.p_turn==me.piece_color &&  me.piece_color!=null) {
		$('#play').prop('disabled', false);
		$('#colrow').show(1000);
		x=0;
		// do play
		if(old_stats.p_turn!=game_status.p_turn) {
			fill_board();
		}
	//	$('#move_div').show(1000);
		timer=setTimeout(function() {update_game_status();}, 15000);
	} else {
		$('#play').prop('disabled', true);
		$('#colrow').hide(1000);
		// must wait for something
//		$('#move_div').hide(1000);
		timer=setTimeout(function() { update_game_status();}, 4000);
	}
}

	if (game_status.status == 'started' && me.piece_color == 'B'){
		$('#img1').show(1000);
	} else if (game_status.status == 'started' && me.piece_color == 'W'){
		$('#img2').show(1000);
	}
	

	}



function update_player_info(){
	$('#game_info').html("Color: "+ me.piece_color+"<br> Username: "+me.username +'<br>Token='+me.token+'<br>Game state: '+game_status.status+', '+ game_status.p_turn+' must play now.');
	
}

function login_result(data) {
	me = data[0];
	$('#game_initializer').hide();
	update_player_info();
	update_game_status();
}

function login_error(data) {
	var x = data.responseJSON;
	alert(x.errormesg);
}


function do_move() {
//	var target = e.target;
//	var td_id = target;
$('#play').prop('disabled', true);

	var x = $('#row_id').val();
	var y = $('#col_id').val();
	$.ajax({url: "gomoku.php/board/move/", 
	method: 'PUT',
	dataType: "json",
	contentType: 'application/json',
	data: JSON.stringify( {x: x, y: y, piece_color: me.piece_color}),
	headers: {"X-Token": me.token},
	success: move_result,
	error: login_error});

}

function move_result(data){
	update_game_status();
	fill_board_by_data(data);
}