<?php
include('translations.php');
$user_lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$language = $user_lang[0] . $user_lang[1];
//Hardcode Language
//$language = "es";
$trans = $translations[$language];
?>

<!DOCTYPE html>
<html lang="<?php echo $language ?>">
<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="./css/ionicons.min.css">
  <link rel="stylesheet" href="./css/owl.carousel.css">
  <link rel="stylesheet" href="./css/owl.theme.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body >
  <header id="home" class="gradient-violat">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://artyficial.net"><span class="logo-wraper logo-white">
            <img src="./images/Logo.png" alt=""> Artyficial </span>
            <span class="tslogan"> Technologies S.A.S</span>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav  navbar-right">
            <li class="active"><a href="#home"><?php echo $trans['menu_home_btn']; ?> <span class="sr-only">(current)</span></a></li>
            <li><a href="#customer-support"><?php echo $trans['menu_support_btn']; ?></a></li>
            <li><a href="team"><?php echo $trans['menu_team_btn']; ?></a></li>
            <li><a href="#services"><?php echo $trans['menu_services_btn']; ?></a></li>
            <!-- <li><a href="#feature"><?php echo $trans['menu_solutions_btn']; ?></a></li> -->
            <li><a href="#contactus" class="btn btn-orange border-none btn-rounded-corner btn-navbar"><?php echo $trans['menu_contact_btn']; ?><span class="icon-on-button"><i class="ion-ios-bulb-outline"></i></span></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
        <hr class="navbar-divider">
      </div><!-- /.container-fluid -->
    </nav>
  </header>