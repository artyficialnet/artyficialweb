<?php
include('translations.php');
$user_lang = filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($user_lang !== false) {
  $language = substr($user_lang, 0, 2);
  $language = preg_replace('/[^a-zA-Z]/', '', $language);
} else {
  // default language if the header is not present or invalid
  $language = 'en';
}
//Hardcode Language
//$language = "es";
$trans = $translations[$language];
?>

<!DOCTYPE html>
<html lang="<?php echo $language ?>">

<head>
  <!-- Meta tags always come first -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Artyficial Technologies S.A.S.</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Artyficial's Web development agency main web site.">
  <meta name="keywords" content="web development, software development, Bogota, Colombia">
  <meta name="author" content="||artyficial.net||">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./../css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="./../css/ionicons.min.css">
  <link rel="stylesheet" href="./../css/owl.carousel.css">
  <link rel="stylesheet" href="./../css/owl.theme.css">
  <link rel="stylesheet" href="./../css/style.css">
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-C5YV0KDQ5L"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-C5YV0KDQ5L');
</script>

<body>
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
              <img src="./../images/Logo.png" alt="Logo Artyficial"> Artyficial </span>
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