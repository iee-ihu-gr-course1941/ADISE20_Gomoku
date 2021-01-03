var me = {username:null, token:null, piece_color:null};
var game_status ={};
var timer = null;


$(function () {
	draw_empty_board();
	fill_board();

	$('#login').click( login_to_game);
	$('#reset').click( reset_board);
	//$('#do_move').click( do_move);
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
}




function fill_board() {
	$.ajax({url: "gomoku.php/board/", 
		method: 'GET',
		dataType: 'json',
		headers: {"X-Token": me.token},
		success: fill_board_by_data });
}

function fill_board_by_data(data) {
	board=data;
	for(var i=0;i<data.length;i++) {
		var z = data[i];
		var id = '#square_'+ z.x +'_' + z.y;
	}
}

function reset_board() {
	$.ajax({url: "gomoku.php/board/", 
	headers: {"X-Token": me.token}, 
	method: 'POST',  
	success: fill_board_by_data });
	//$('#move_div').hide();
	$('#game_initializer').show(2000);
}	
	
function login_to_game() {
    if ($('#username').val() == '') {
        alert('You have to set a username!');
        return;
  }

	$.ajax({url: "gomoku.php/players/", 
			method: 'PUT',
			dataType: 'json',
			headers: {"X-Token": me.token},
			contentType: 'application/json',
			data: JSON.stringify( {username: $('#username').val(), piece_color: $('#piece_color').val()}),
			success: login_result,
			error: login_error});
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
}

function update_player_info(){
	$('#game_info').html("Color: "+me.piece_color+"<br> Username: "+me.username +'<br>Token='+me.token+'<br>Game state: '+game_status.status+', '+ game_status.p_turn+' must play now.');
	
}


/*function do_move() {

    var $move = $('#cmove').val();

    if ($move < 1 || $move > 15) {
        alert('Δώσε έγκυρη στήλη');
        return;
    }

    $.ajax({
        url: "gomoku.php/board/move/",
        method: 'PUT',
        dataType: 'json',
        headers: { "X-Token": me.token },
        contentType: 'application/json',
        data: JSON.stringify({ move: $move, piece_color: me.piece_color }),
        success: result_move,
        error: login_error
    });

}*/

function result_move(data) {
    update_game_status();
    fill_board();


}

