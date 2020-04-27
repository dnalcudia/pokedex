<?php 
require(__DIR__.'/../php/mysqlMain.php');
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
    <link rel="stylesheet" href="../css/Main.css" />
    <link rel="stylesheet" href="../css/Modal.css" />
    <title>Homepage</title>
  </head>
  <body onload="verifyMain()">
    <div class="Navbar">
      <div class="container-fluid d-flex justify-content-between">
        <a class="Navbar__brand" href="javascript:window.location.assign('main.php')">
          <img
            class="Navbar__brand-logo"
            src="../img/megaball.svg"
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
              echo $name;
              ?>
            </p>
          </div>
          <ul>
            <li><a class="font-weight-bold" href="javascript:window.location.assign('profile.php')">Pokédex</a></li>
            <li><a class="font-weight-bold" href="javascript:window.location.assign('social.php')">Social</a></li>
            <li><a onclick="logout()" class="font-weight-bold" href="#">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="Main__hero">
        <div class="Hero__container">
          <img src="../img/avatar-10.svg" alt="">
          <div class="form-group">
            <label class="font-weight-bold justify-self-center" for="filter-pokemon"> Filter Pokémon</label>
            <input type="text" class="form-control" id="filter-pokemon" onkeyup="filterPokemon()"/>
          </div>
          <img src="../img/avatar-2.svg" alt="">
        </div>
        </div>
      </div>
    </div>
    <div class="Cards">
      <div class="row PokeCard__row" id="pokeRow">
        <img class="gif" src="../img/loader.gif" width="200" height="200" alt="">
      </div>
    </div>
    <div class="overlay" id="overlay">
    </div>
    <div class="modal" id="modal">
      <h1 class="font-weight-light" >Pokémon´s name</h1>
      <div class="modal-content">
        <div class="row d-flex justify-content-center">
          <img src="" alt="" width="212">
        </div>
        <div class="row">
          <ul>
            <li id="pokemon-weight"></li>
            <li id="pokemon-height"></li>
            <li id="pokemon-experience"></li>
          </ul>
        </div>
      </div>
      <div class="modal-buttons d-flex flex-row justify-content-center">
        <button class="modal-btn warning font-weight-bold" id="hide-modal">Close</button>
        <form action="../php/mysqlAddToPokedek.php" method="post" id="main-form">
        <button type="submit" class="modal-btn primary font-weight-bold" id="pokemon-add">Add to Pokédex</button>
        </form>
      </div>
    </div>
    <footer class="page-footer font-small special-color-dark pt-1">
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
          Daniel Alcudia & Ezequiel Meraz
        </div>
      </footer>
    <script src="../js/main.js"></script>
  </body>
</html>
