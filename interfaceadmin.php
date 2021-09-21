<?php  
$bdd= new PDO("mysql:host=localhost;dbname=gss;charset=utf8","root","");
$conn = mysqli_connect("localhost", "root", "", "gss");
                        session_start();
                       session_id();
                       $id=$_SESSION['idcompte'];
$sql = 'SELECT * FROM `compte` WHERE `idcompte`=:id';
$statement = $bdd->prepare($sql);
$statement->execute([':id' => $id]);
$file = $statement->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <title>GSS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,500,500italic,700,900">
       
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/templatemo-misc.css">
        <link rel="stylesheet" href="css/templatemo-style0.css">
        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
         <style type="text/css">
               a.btn-left, .top-header .social-top ul li a, .main-header .menu-wrapper a.toggle-menu {
                                    border: 2px solid #5E7D7E;
                                    border-radius: 40%;}
        </style>
    </head>
    <body>
      


        <section id="pageloader">
            <div class="loader-item fa fa-spin colored-border"></div>
        </section> 

          <header class="site-header container-fluid">
            <div class="top-header">
                <div style="padding: 5px 0 5px 5px;">   <img src="images/log9.png" width="100px" height="100px"   ></div>
                <div class="logo col-md-6 col-sm-6">
                
                    
                </div> 
                <div class="social-top col-md-6 col-sm-6">
                    <ul>
          <li style="margin-right:3px;"><a href="interfaceadmin.php" class="fa fa-home" title="Accueil" ></a></li>
         <li><a href="liste-compte.php" class="fa fa-users" title="Comptes"></a></li>

                       <li><a href="profile.php" class="fa fa-user" title="Profile"></a></li>
                        <li><a href="msg.php" class="fa fa-envelope" title="Gmail"></a></li>
                        <li><a href="statistiques.php" class="fa fa-signal" title="Statistiques"></a></li>
                        <li><a href="deconecte.php" class="fa fa-sign-out" title="Déconnexion"></a></li> 
                      </ul>
                </div> 
            </div> 
            <div class="main-header">
                <div class="row">
                       <div class="main-header-left col-md-3 col-sm-6 col-xs-8">
                        <a href="#" class="btn-left arrow-left fa fa-angle-left"></a>
                        <a href="#" class="btn-left arrow-right fa fa-angle-right"></a>
                    </div> <!-- /.main-header-left -->
                     <div class="main-header-left col-md-3 col-sm-6 col-xs-8">
                    </div>
                   
                       <div class="menu-wrapper col-md-9 col-sm-6 col-xs-4">
                         <ul class="sf-menu hidden-xs hidden-sm" style="margin-right:30px;">
                            <li>    <i class="fa fa-desktop"></i>
                                  <b><a style="color:#151B54; "href="#"><?= $file->nom;?></a></b>
                          <img style="width:26px;height:26px; border-radius: 50% !important; display:inline;" 
                             src="img/<?= $file->avatar;?>">
                            
                            </li>
                   
                        </ul>
                    </div>
                </div> 
            </div> 

           
        </header>
        
        <div class="swiper-container">
            <div class="swiper-wrapper">

                   <div class="swiper-slide" style="background-image: url(images/slide1.jpg);">
                    <div class="overlay-s"></div>
                    <div class="slider-caption">
                        <div class="inner-content">
                            <h2>SONATRACH</h2>
                            <p>SOCIETE NATIONALE DE TRANSPORT </p><p>ET DE LA COMMERCIALISATION DES HYDROCARBURES</p>
                        </div> 
                    </div> 
                </div> 

                <div class="swiper-slide" style="background-image: url(images/slide2.jpg);">
                    <div class="overlay-s"></div>
                    <div class="slider-caption">
                        <div class="inner-content">
                            <h2>SERVEURS DE PARTAGE</h2>
                            <p>GÉRER: </br>Les serveurs , Les fichiers partagés , Les groupes de partage , Les droits d'accés...</p>
                            <a href="liste-serveurs-par.php" class="main-btn white">Consulter</a>
                        </div> <!-- /.inner-content -->
                    </div> <!-- /.slider-caption -->
                </div> <!-- /.swier-slide -->

                <div class="swiper-slide" style="background-image: url(images/slide3.jpg);">
                    <div class="overlay-s"></div>
                    <div class="slider-caption">
                        <div class="inner-content">
                            <h2>SERVEURS D'APPLICATIONS</h2>
                            <p>GÉRER: </br>Les serveurs , Les applications...</p>
                            <a href="liste-serveurs-app.php" class="main-btn white">Consulter</a>
                        </div> 
                    </div> 
                </div> 
            </div>
        </div> 

        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Preloader -->
        <script type="text/javascript">
            //<![CDATA[
            $(window).load(function() { // makes sure the whole site is loaded
                $('.loader-item').fadeOut(); // will first fade out the loading animation
                    $('#pageloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
                $('body').delay(350).css({'overflow-y':'visible'});
            })
            //]]>
        </script>
        
    </body>
</html>

