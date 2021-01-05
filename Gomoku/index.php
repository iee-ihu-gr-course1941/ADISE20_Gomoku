<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<title>Gomoku</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="js/gomoku.js"></script>
    <link rel="stylesheet" href="css/gomoku.css"/>

</head>

<body>
<div class="container-fluid" id="container">
   <div class="row justify-content-center" id="title">
 	  <div id="text">Gomoku</div>
   </div>
   
<div class="row justify-content-center" id="board"></div> 
<br></br>
     <div class="row justify-content-center">
         <div id='game_initializer'>
              <div class="d-flex justify-content-center">
                <input id='username'/>
                     <select id='piece_color'>
                         <option value='B'>B</option>
                         <option value='W'>W</option>
                     </select>
                 <button id='login' class='btn btn-outline-danger'>ΕΙΣΟΔΟΣ</button><br></br>
                </div>
                
            </div>
			<div id='game_info'>
			    </div>
             <button id='gomoku_reset' class='btn btn-primary'>ΕΝΑΡΞΗ/RESET</button>

    </div>
</div>
</body>

</html>
