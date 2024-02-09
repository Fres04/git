<?php 
	session_start(); 
	if(isset($_SESSION['username'])) { 
		header( "Location:tetris.php"); 
	}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tetris - Login</title>
    <script src="frameworks/js/jquery-2.1.1.js" charset="utf-8"></script>
    <link rel="stylesheet" href="tetris.css" title="Tetris" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="frameworks/css/font-awesome.min.css" title="Tetris" type="text/css" media="screen" charset="utf-8">
    <link rel="icon" href="tetris.png" type="image/png">
</head>

<body>
    <div id="container">
        <img id="logo" src="tetris.png" width="250px" height="250px">
        <center>
            <h1>Bienvenido a TETRIS-DAW</h1>
            <p>Inicia sesión para poder jugar</p>
            <form name="login" value="login" action="flogin.php" method="post">
                <input type="text" class="textbox" name="username" placeholder="Usuario">
                <br>
                <input type="password" class="textbox" name="password" placeholder="Contraseña">
                <br>
                <input type="submit" name="login" class="buttonb" value="LOGIN">
            </form>
            <hr>
            <br>
            <span>Quieres crear una cuenta?&nbsp;</span>
            <a href="signup.php" class="buttong"><i class="fa fa-user"></i>&nbsp;REGISTRATE</a>
        </center>
    </div>
    </div>
</body>
</html>
