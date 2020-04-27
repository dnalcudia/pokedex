<?php
$name = "";
//establecemos la conexión con la base de datos
$link = mysqli_connect("localhost","root","","Pokewebapp");
//revisamos que se haya realizado la conexión
if($link == false){
	$message = "ERROR: Could not connect ".mysqli_connect_error();
}else{
//obtenemos los datos enviados por el post
$email = $_COOKIE["currentEmail"];
//comprobaremos que  exista el correo y contrasena en la base de datos
$sql = "SELECT nombre FROM Usuario WHERE correo='$email'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0){
    while ($row = $result->fetch_assoc())
    {
        foreach($row as $value) $name = $value;
    }
  
    	 //ahora, lo que haremos sera cargar en la lista, 
    //usuarios aleatorios que se encuentren en la base de datos, para ello, necesitamos los ids de usuarios registrados.
    $sql = "SELECT * FROM Usuario WHERE correo != '$email'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0){
    	while ($row = $result->fetch_assoc())
    {
       $users[] = $row;
    } 
    //ahora, si solo queremos desplegar 4 usuarios, lo que haremos
    //sera obtener 3 usuarios aleatorios del array generado, este
    //se guardara en otro array que será usado para el social.php
    $used[] = array();
    $maxi = sizeof($users);
    if($maxi>3){
    	$maxi=3;
    }
    for($i = 0;$i<$maxi;$i++){
    	$random = rand(0,sizeof($users)-1);   	
    	for($j=0;$j<sizeof($used);$j++){
    		if($random==$used[$j]){
    			while($random==$used[$j]){
    			$random = rand(0,sizeof($users)-1);  
    			}
    		}else{
    			break;
    		}   		
    	}
    	$used[$i]=$random;
    	$usersToUse[$i]=$users[$random];
    }
    //Ya que tenemos los usuarios a desplegar, necesitamos realizar
    //el query que nos devuelva cuantos pokemons tiene
  $counters = array();
  for($i=0;$i<$maxi;$i++){
  	$id_usuario = $usersToUse[$i]["id"];
  	$sql="SELECT COUNT(p.id) AS 'n' FROM Pokemon p
 INNER JOIN Pokedek_pokemon pp ON p.id = pp.id_pokemon 
 INNER JOIN Pokedek pk  ON pp.id_pokedek = pk.id
 INNER JOIN Usuario u ON pk.id_usuario = u.id WHERE u.id ='$id_usuario'";
  $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0){
    	while ($row = $result->fetch_assoc())
    {
       array_push($counters, $row);
    }
    }else{
    	echo "Count pokemons query error";
		// Close connection
		mysqli_close($link);
    }
  }
    }else{
    	echo "Count query error";
		// Close connection
		mysqli_close($link);
    }
}else{
	$message = "Credenciales incorrectas";
// Close connection
mysqli_close($link);}
  }
?>