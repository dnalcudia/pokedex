<?php 
require(__DIR__.'/../php/mysqlMain.php');
require(__DIR__.'/../php/mysqlSearchUser.php');
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
    <link rel="stylesheet" href="../css/Social.css" />
    <link rel="stylesheet" href="../css/Badge.css" />
    <title>Social</title>
  </head>
  <body onload="verifySocial()">
    <div class="Navbar">
      <div class="container-fluid d-flex justify-content-between">
        <a class="Navbar__brand" href="javascript:window.location.assign('main.php')">
          <img
            class="Navbar__brand-logo"
            src="../img/social.svg"
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
            <li><a class="font-weight-bold" href="javascript:window.location.assign('main.php')">Home</a></li>
            <li><a onclick="logout()" class="font-weight-bold" href="#">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="ml-5 mr-5 mt-3 Social__title d-flex justify-content-center flex-column">
      <div class="row">
          <div class="col-6 ml-5">
          <h1 class="display-3">Find more Pokémon trainers here!</h1>
          <form action="social.php" method="post" id="search-form">
            <div class="input-group mt-4 mb-1">
                <div class="input-group-prepend">
                  <button class="btn btn-primary" type="submit">Search</button>  
                </div>
                  <input type="text" class="form-control" placeholder="by email" aria-label="" aria-describedby="basic-addon1" id="user-mail" name="user-mail">
                </div>
                    <small class="font-weight-bold text-danger mb-5">
                      <?php 
                      echo $message;
                      ?>
                    </small>
          </form>             
          <div class="container">
            <?php
            for($i=0;$i<$maxi;$i++){
            echo " <div class=\"Social__users\">
              <a id=\"btnU\" onclick=\"dispUser('".$usersToUse[$i]["correo"]."')\" href=\"javascript:window.location.assign('trainerView.php')\" class=\"font-weight-bold BadgesListItem__text\">
                <li class=\"BadgesListItem\">
                    <img
                      src=\"../img/avatar.svg\"
                      alt=\"avatar\"
                      class=\"BadgesListItem__avatar\"
                    />
                    <div>
                      <div>
                        <span>".
                          $usersToUse[$i]["nombre"]
                        ."</span>
                      </div>
                      <div class=\"font-weight-light\">".
                        $usersToUse[$i]["correo"]
                      ."</div>
                      <div class=\"font-weight-light\">".
                        $counters[$i]["n"]." Pokémons on his own
                      </div>
                    </div>
                  </li>
              </a>
            </div>";
                }
            ?>
           
          </div>
          </div>
          <div class="col-5 d-flex justify-content-center flex-column">
            <div class="d-flex justify-content-center">
                 <img class="Social__img" src="../img/pika.png" alt="" width="440px">
            </div>
              </div>
          </div>
        </div>
    <script src="../js/social.js"></script>
  </body>
</html>