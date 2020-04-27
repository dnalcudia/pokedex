<?php
$message = "";

//establecemos la conexión con la base de datos
if(!empty($_POST)) {
$link = mysqli_connect("localhost","root","","Pokewebapp");
//revisamos que se haya realizado la conexión
if($link == false){
	$message = "ERROR: Could not connect ".mysqli_connect_error();
}else{
//obtenemos los datos enviados por el post
$email = $_POST["email"];
$pwd = $_POST["pwd"];

//comprobaremos que  exista el correo y contrasena en la base de datos
$sql = "SELECT correo, contrasena FROM Usuario WHERE correo='$email' and contrasena='$pwd'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0){
	header('Location: ../html/main.php');
}else{
	$message = "Credenciales incorrectas";
// Close connection
mysqli_close($link);}
  }
}
?>