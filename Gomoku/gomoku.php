<?php

require_once "lib/dbconnect.php";
require_once "lib/board.php";
require_once "lib/players.php";
require_once "lib/game.php";
//require_once "lib/winner.php";

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);
if(isset($_SERVER['HTTP_X_TOKEN'])) {
	$input['token']=$_SERVER['HTTP_X_TOKEN'];
}


switch ($r = array_shift($request)) {
    case 'board':
        switch ($r = array_shift($request)) {
            case '':
			case null: handle_board($method,$input);
                  break;
            case 'reset':
                reset_board();
                break;
            case 'move':
                handle_board($method, $input);
                break;
        }
	case 'players': handle_player($method, $request,$input);
        break;        
        
    case 'status':
       if(sizeof($request)==0) {show_status();}
		else {header("HTTP/1.1 404 Not Found");}
		break;  
	default:
        header("HTTP/1.1 404 Not Found");
        print json_encode(['errormsg' => "Switch problem."]);
        exit;
}

function handle_board($method,$input) {
 
    if($method=='GET') {
        show_board($input);
        if ($method == 'PUT') {
        do_move($input);
        }   
    }
}

function handle_piece($method, $x,$y,$input) {
	if($method=='GET') {
        show_piece($x,$y);
    } else if ($method=='PUT') {
		move_piece($x,$y,$input['x'],$input['y'],$input['token']);
    }    
}

function handle_player($method, $input)
{
    handle_user($method, $input);
}
?>