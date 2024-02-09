<!DOCTYPE html>
<html>
	<head>
		<title>Tetris - Sign up</title>
		<script src="tetris.js" charset="utf-8"></script>
		<script src="frameworks/js/jquery-2.1.1.js" charset="utf-8"></script>
		<link rel="stylesheet" href="tetris.css" title="Tetris" type="text/css" media="screen" charset="utf-8">
		<link rel="stylesheet" href="frameworks/css/font-awesome.min.css" title="Tetris" type="text/css" media="screen" charset="utf-8">
		<link rel="icon" href="tetris.png" type="image/png">
	</head>
	<body>
		<div id="container">
			<img id="logo" src="tetris.png" width="100px" height="100px">
				<center>
				<h1>Registro</h1>
				<p>Mete un Usuario y una Contraseña</p>
				
				<form name="signup" value="signup" action="fsignup.php" method="post">
					<input type="text" class="textbox" name="name" placeholder="Nombre" pattern="([a-zA-Z]{1,}[ ]{0,1}){1,}"required title="Begin with an alphabet - Alphabets and spaces only"><br>
					<input type="text" class="textbox" name="username" placeholder="Usuario" pattern="[a-z]{1}[a-z0-9_]{1,19}" required title="2-20 characters (Begin with an alphabet - only lowercase, numbers and underscore allowed)"><br>
					<input type="password" class="textbox" name="password" placeholder="Contraseña" required pattern="[a-zA-Z0-9_@\#\^\$\ ]{4,}" title="4 or more characters (Alphabets, numbers, spaces, @, #, ^, $ allowed)"><br>
					<input type="password" class="textbox" name="passwordre" placeholder="Repite contraseña" required pattern="[a-zA-Z0-9_@\#\^\$\ ]{4,}" title="Same as above field"><br>
                    <button type="submit" name="signup" class="buttong"><i class="fa fa-check"></i>&nbsp;CREAR CUENTA</button>
 				</form><hr>
 				<br>
<a href="index.php" class="buttonb-small"><i class="fa fa-angle-left"></i>&nbsp;VOLVER</a>
				</center>
			</div>
		</div>
		</body>
</html>
