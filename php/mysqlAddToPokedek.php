<?php
$id_usuario = "";
$id_pokedek = "";
$id_pokemon = "";

$message = "";
//establecemos la conexión con la base de datos
$link = mysqli_connect("localhost","root","","Pokewebapp");
//revisamos que se haya realizado la conexión
if($link == false){
	$message = "ERROR: Could not connect ".mysqli_connect_error();
}else{
//obtenemos los datos enviados por el post
$email = $_COOKIE["currentEmail"];
//obtendremos el id del usuario usando su correo
$sql = "SELECT id FROM Usuario WHERE correo='$email'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0){
    while ($row = $result->fetch_assoc())
    {
        foreach($row as $value) $id_usuario = $value;
    }
    //ya que tenemos el id del usuario,obtendremos el id del pokedek del usuario
    $sql = "SELECT id FROM Pokedek WHERE id_usuario='$id_usuario'";
    $result = mysqli_query($link, $sql);
 if (mysqli_num_rows($result) > 0){
 	while ($row = $result->fetch_assoc())
    {
        foreach($row as $value) $id_pokedek = $value;
    }
    //Una vez que ya tenemos el id del usuario y del pokedek, haremos el insert en la BD
    //primero obtenemos los specs del pokemon de los cookies
    $img_id = $_COOKIE["img_id"];
    $especie = $_COOKIE["especie"];
    $peso = $_COOKIE["peso"];
    $altura = $_COOKIE["altura"];
    $baxp = $_COOKIE["baxp"];
    //Creamos el query de insert para el pokemon
    $sql = "INSERT INTO Pokemon (img_id,especie,nombre,peso,altura,baxp) VALUES ('$img_id','$especie','$especie','$peso','$altura','$baxp')";
    if(mysqli_query($link, $sql)){
    	//Ya que agregamos el pokemon es hora de agregarlo al pokedek
    	//obtendremos el registro del ultimo pokemon agregado
    	$sql = "SELECT id FROM Pokemon ORDER BY id DESC LIMIT 1";
    	$result = mysqli_query($link, $sql);
 		if (mysqli_num_rows($result) > 0){
 				while ($row = $result->fetch_assoc())
    		{
        	foreach($row as $value) $id_pokemon = $value;
    		}
    		//ya que encontramos el id del pokemon, lo agregamos al pokedek
    		$sql = "INSERT INTO Pokedek_pokemon (id_pokedek,id_pokemon) VALUES ('$id_pokedek','$id_pokemon')";
    		if(mysqli_query($link, $sql)){
				$message = "Pokemon added to Pokedek";
				header('Location: ../html/successInsert.html');
    		}else{
    			$message = "Pokemon cannot be added to Pokedek";
			// Close connection
			mysqli_close($link);
    		}

    	}else{
			// Close connection
			mysqli_close($link);
    	}

}else{
// Close connection
mysqli_close($link);} 

 }  else{
// Close connection
mysqli_close($link);} 
}else{
// Close connection
mysqli_close($link);}
  }
?>