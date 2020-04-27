<?php
$message = "";

//establecemos la conexión con la base de datos
if(!empty($_POST)) {
$link = mysqli_connect("localhost","root","","Pokewebapp");
//revisamos que se haya realizado la conexión
if($link == false){
	die("ERROR: Could not connect ".mysqli_connect_error());
}else{
//obtenemos los datos enviados por el post
$email = $_POST["email"];
$name = $_POST["name"];
$pwd = $_POST["pwd"];
$creditcard = $_POST["creditCard"];
$secretnumber= $_POST["secretNumber"];
$date = date("Y/m/d h:i:s");
//comprobaremos que no exista el correo en la base de datos
$sql = "SELECT * FROM Usuario WHERE correo='$email'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0){
	$message = "Error: Email already exists";
}else{
//preparamos el query
$sql="INSERT INTO Usuario (nombre,correo,contrasena,numero_tarjeta,numero_secreto,fecha_creacion) VALUES ('$name','$email','$pwd','$creditcard','$secretnumber','$date')";
//revisamos que se ejecute el query
	if(mysqli_query($link, $sql)){
		//preparamos el query para agregar el pokedek
		$sql="SELECT id FROM Usuario WHERE correo='$email'";
		$result = mysqli_query($link, $sql);
		$id="";
		while($row = mysqli_fetch_array($result)){
                $id = $row['id'];
        }
        //Ya que tenemos el id, hacemos el insert
        $sql="INSERT INTO Pokedek (id_usuario) VALUES ('$id')";
        //revisamos que se registre este ultimo query
        if(mysqli_query($link, $sql)){
        	header('Location: ../html/signin.php');
			exit(); 
        }else{
        	$message = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }	
} else{
  $message = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
// Close connection
mysqli_close($link);}
  }
}
?>