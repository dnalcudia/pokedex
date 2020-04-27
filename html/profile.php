<?php 
require(__DIR__.'/../php/mysqlProfile.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/svg" href="../img/pokedex.png" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/Navbar.css" />
    <link rel="stylesheet" href="../css/Pokedex.css" />
    <link rel="stylesheet" href="../css/Modal.css" />
    <title>Pokédex</title>
  </head>
  <body onload="verifyProfile()">
    <div class="Navbar">
      <div class="container-fluid d-flex justify-content-between">
        <a class="Navbar__brand" href="javascript:window.location.assign('main.php')">
          <img
            class="Navbar__brand-logo"
            src="../img/ultraball.svg"
            alt="Logo"
          />
          <span class="font-weight-light">Poké</span>
          <span class="font-weight-bold">dex</span>
        </a>
        <div class="header__menu">
          <div class="header__menu--profile">
            <img src="../img/avatar.svg" alt="User" />
            <p>
            <?php 
            echo $name
            ?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="Pokedex">
      <div class="row d-flex justify-content-between align-items-center">
        <h1 class="display-4 pl-4">
          <span class="font-weight-light ml-2">
            Welcome to your Pokédex
          </span>
          <span class="font-weight-bold">
            <?php 
            echo $name
            ?>!
          </span>
        </h1>
        <div class="d-flex flex-direction-row">
          <div>
            <a
              href="javascript:window.location.assign('main.php')"
              class="btn btn-primary mr-3 font-weight-bold"
              >Search more</a
            >
          </div>

          <div>
            <a
              href="javascript:window.location.assign('social.php')"
              class="btn btn-warning mr-3 font-weight-bold"
              >Social</a
            >
          </div>
  
          <div>
            <a
              onclick="logout()"
              class="btn btn-danger mr-5 font-weight-bold"
              >Logout</a
            >
          </div>
        </div>
      </div>
        <?php
        if($flag){
        	echo "<div class=\"row d-flex justify-content-center mb-4 mt-3 border\">
        <div class=\"col-2 d-flex flex-column justify-content-center align-items-center border\">
        	<h1 class=\"mb-3\">".$myArr[0]["nombre"]."</h1>
          <h4 class=\"font-weight-light\">".$myArr[0]["peso"]." lbs.</h4>
          <h4 class=\"font-weight-light\">".$myArr[0]["altura"]." fts.</h4>
          <h4 class=\"font-weight-light\">BAXP: ".$myArr[0]["baxp"]." pts.</h4>
          <span onclick='showEditModal()' class=\"btn btn-success mt-4 font-weight-bold\"
          >Edit Name</span>
        <span onclick='showDeleteModal()' class=\"btn btn-danger mt-4 font-weight-bold\"
          >Delete Pokémon</span
        >
        </div>";
      } else {
        echo "<div class=\"row d-flex justify-content-center mb-4 mt-3 border\">
        <div class=\"col-2 d-flex flex-column justify-content-center align-items-center border\">
        </div>";
      }
        ?>
        <div class="col-10 d-flex justify-content-center border">
          <?php
          if($flag){
          	echo "<img class=\"Pokemon__img\" src=\"https://pokeres.bastionbot.org/images/pokemon/".$myArr[0]["img_id"].".png\" alt=\"\" />";  
          } else {
            echo "
            <div class=\" d-flex flex-column justify-content-center\">
            <div class=\"mt-5 text-center d-flex flex-column\">
            <span class=\"display-2\">Currently empty</span>
            <span class=\"font-weight-bold\">Get back to the homepage to search more Pokémon!</span>
            <div\">
            <img class=\"mt-4 mb-5\" src=\"../img/broke.svg\" alt=\"\" width=\"400\">
            </div>
            </div>
            </div>"; 
          }
          ?>
        </div>
      </div>
      <?php
      if($flag && $totalPokes>1){
      	echo "<div class=\"row\">
        <section class=\"carousel\">
          <h2>
            <span class=\"font-weight-light\"> Your </span>
            <span class=\"font-weight-bold\"> Pokémons: </span>
          </h2>
          <div class=\"carousel__container\">";
            for($i=1;$i<sizeof($myArr);$i++){
              echo "<div class=\"carousel-item\">
              <img id=\"".$myArr[$i]["id"]."\" class=\"carousel-item__img\" src=\"https://pokeres.bastionbot.org/images/pokemon/".$myArr[$i]["img_id"].".png\" alt=\"Cat\" />
              <form action=\"../php/changePokemon.php\" method=\"post\" id=\"display-form\">
              <div class=\"carousel-item__details\" onclick=\"displayPokemon(".$myArr[$i]["id"].")\">
                <p class=\"carousel-item__details--title\">".$myArr[$i]["nombre"]."</p>
              </div>
              </form>
            </div>";
            };
            echo"
          </div>
        </section>
      </div>";
      }
      ?>
    </div>
    <div class="overlay" id="overlay">
    </div>
    <div class="modal" id="edit-modal">
      <h1 class="font-weight-light" >Give your pokemon a name!</h1>
      <div class="d-flex justify-content-center mt-3"> 
      <img
      class="rounded"
            src="../img/giphy.gif"
            alt="Gif"
            width="290px"
          />
      </div>
      <form action="../php/mysqlUpdateProfile.php" method="post" id="update-form">
        <div class="modal-content mt-3 mb-2">
        <input class="form-control" placeholder="Your pokemon will be grateful :)" id="poke_nae" name="poke_name">
      </div>
      <div class="modal-buttons d-flex flex-row justify-content-center">
        <button onclick="hideEditModal()" class="modal-btn warning font-weight-bold" id="hide-modal">Cancel</button>
        <button type="submit" class="modal-btn primary font-weight-bold" id="pokemon-add">Edit Name</button>
      </div>
    </div>
      </form>
      
    <div class="modal" id="delete-modal">
      <h1 class="font-weight-light" >Are you sure you want to kill your Pokémon?</h1>
      <div class="d-flex justify-content-center mt-4"> 
      <img
            class="rounded"
            src="../img/sad.gif"
            alt="Gif"
            width="300px"
          />
      </div>
      <div class="modal-buttons d-flex flex-row justify-content-center">
        <button onclick="hideDeleteModal()" class="modal-btn primary font-weight-bold" id="hide-modal">Cancel</button>
        <form action="../php/mysqlDeleteProfile.php" id="delete-form" method="post">
          <button type="submit" class="modal-btn warning font-weight-bold" id="pokemon-add">Delete</button>
        </form>
      </div>
    </div>
    <script src="../js/profile.js"></script>
  </body>
</html>
