<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

<title>Gomoku</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>

    <!-- jQuery library -->
    <script src="bootstrap/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="bootstrap/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="bootstrap/bootstrap.min.js"></script>
    
    <script src="js/gomoku.js"></script>
    <link rel="stylesheet" href="css/gomoku.css"/>

</head>

<body>
   <div class="container-fluid" id="container">
   <div class="row justify-content-center">
       <h1>Gomoku</h1>
   </div>
   <div class="row justify-content-center" id="board">

   </div>
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
                <div id='game_info'>
			    </div>
            </div>
             <button id='gomoku_reset' class='btn btn-primary'>ΕΝΑΡΞΗ/RESET</button>

    </div>


  
</body>

</html>
