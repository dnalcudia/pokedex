<?php 
require(__DIR__.'/../php/mysqlGetUser.php');
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
    <link rel="stylesheet" href="../css/Social.css" />
    <title>Trainer View</title>
  </head>
  <body onload="verifySocial()">
    <div class="Navbar">
      <div class="container-fluid d-flex justify-content-between">
        <a
          class="Navbar__brand"
          href="javascript:window.location.assign('main.php')"
        >
          <img class="Navbar__brand-logo" src="../img/social.svg" alt="Logo" />
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
            <li>
              <a
                class="font-weight-bold"
                href="javascript:window.location.assign('profile.php')"
                >Pokédex</a
              >
            </li>
            <li>
              <a
                class="font-weight-bold"
                href="javascript:window.location.assign('social.php')"
                >Social</a
              >
            </li>
            <li>
              <a
                class="font-weight-bold"
                href="javascript:window.location.assign('main.php')"
                >Home</a
              >
            </li>
            <li>
              <a onclick="logout()" class="font-weight-bold" href="#">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div
      class="ml-5 mr-5 mt-3 Social__title d-flex flex-column"
    >

    <div class="d-flex justify-content-center align-items-center">
      <div class="d-flex flex-column">
        <h1 class="display-1">
          <?php
          echo $nombre;
          ?>
        </h1>
        <div class="d-flex justify-content-center font-weight-bold">
          <?php
          echo $user_mail;
          ?>
        </div>
      </div>
              <div class="d-flex flex-column">
                <button disabled class="ml-5 btn btn-success font-weight-bold" href="javascript:window.location.assign('profile.php')">
                  Add to Friends
                </button>

                <a class="ml-5 mt-3 btn btn-danger font-weight-bold" href="javascript:window.location.assign('social.php')">
                  Get back to Social
                </a>
              </div>
    </div>

  <div class="mt-4 d-flex justify-content-center">
    <section class="carousel" aria-label="Gallery">
    <ol class="carousel__viewport">
      <?php
      if(sizeof($poks)!=0){
        for($i=0;$i<sizeof($poks);$i++){
          $ind = $i;
          if($ind==0){
            $previous = sizeof($poks)-1;
            $next = $ind+1;
            $previousLabel = "last";
            $nextLabel = "next";
          }elseif ($ind==sizeof($poks)-1) {
            $previous = $ind-1;
            $next = 0;
            $previousLabel = "previous";
            $nextLabel = "first";
          }else{
            $previous = $ind-1;
            $next = $ind+1;
            $previousLabel = "previous";
            $nextLabel = "next";
          }
          echo "
              <li id=\"carousel__slide".$i."\"
          tabindex=\"0\"
          class=\"carousel__slide\">
          <div class=\"d-flex justify-content-center align-items-center\">
            <img src=\"https://pokeres.bastionbot.org/images/pokemon/".$poks[$i]["img_id"].".png\" alt=\"\" width=\"400px\">
            <div class=\"ml-4 d-flex flex-column\">
              <h1>".$poks[$i]["nombre"]."</h1>
              <h3>".$poks[$i]["peso"]." lbs.</h3>
              <h3>".$poks[$i]["altura"]." fts.</h3>
              <h3>BAXP: ".$poks[$i]["baxp"]." pts.</h3>
            </div>
          </div>
            <div class=\"carousel__snapper\">
          <a href=\"#carousel__slide".$previous."\"
             class=\"carousel__prev\">Go to ".$previousLabel." slide</a>
          <a href=\"#carousel__slide".$next."\"
             class=\"carousel__next\">Go to ".$nextLabel." slide</a>
        </div>
      </li>
          ";
        }
      }else{
        echo "
              <li id=\"carousel__slide0\"
          tabindex=\"0\"
          class=\"carousel__slide\">
          <div class=\"d-flex justify-content-center align-items-center\">
            <img src=\"../img/broke.svg\" alt=\"\" width=\"400px\">
          </div>
      </li>
        ";
      }
      ?>
    </ol>
    <aside class="carousel__navigation">
      <ol class="carousel__navigation-list">
        <?php
        if(sizeof($poks)!=0){
        if(sizeof($poks)>7){
          for($i=0;$i<4;$i++){
              echo "
                <li class=\"carousel__navigation-item\">
          <a href=\"#carousel__slide".$i."\"
             class=\"carousel__navigation-button\">Go to slide ".$i."</a>
        </li>
              ";
          }
          for($i=sizeof($poks)-1;$i>0;$i--){
             echo "
                <li class=\"carousel__navigation-item\">
          <a href=\"#carousel__slide".$i."\"
             class=\"carousel__navigation-button\">Go to slide ".$i."</a>
        </li>
              ";
          }

        }else{
          for($i=0;$i<sizeof($poks);$i++){
            echo "
                <li class=\"carousel__navigation-item\">
          <a href=\"#carousel__slide".$i."\"
             class=\"carousel__navigation-button\">Go to slide ".$i."</a>
        </li>
              ";
            }
          }
        }        
        ?>
      </ol>
    </aside>
  </section>
  </div>

  <div class="mt-3 d-flex justify-content-center">
    <div class="d-flex flex-column">
    <div class="d-flex justify-content-center">
      <a href="#">
        <img src="../img/battle.svg" alt="" width="100px">
</a>
</div>
      <h5 class="mt-1 font-weight-bold text-dark">Request a battle</h5>
    </div>
  </div>
      
    </div>
    <script src="../js/social.js"></script>
  </body>
</html>
