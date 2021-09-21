<?php  
$bdd= new PDO("mysql:host=localhost;dbname=gss;charset=utf8","root","");
$conn = mysqli_connect("localhost", "root", "", "gss");
$id=$_GET['caraa'];

$sql ='SELECT * FROM `serveur` Join`caracteristiques`  WHERE `idserveur` LIKE `serveur_idserveur` AND `idserveur`=:id';
$statement = $bdd->prepare($sql);
$statement->execute([':id' => $id]);
$srv = $statement->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html style="font-size: 85%;">

    <head>
        <meta charset="utf-8">
        <title>GSS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="css1/bootstrap1.css" rel="stylesheet" />
        <link href="css1/style1.css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,500,500italic,700,900">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/templatemo-misc.css">
        <link rel="stylesheet" href="css/templatemo-style0.css">
        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href="js1/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
         <!--AJAX-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" /> -->
        <script rel="stylesheet" href="vendor/bootstrap/js/bootstrap.min.js"></script>
      
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
                
               <div style="padding: 5px 0 5px 5px;">   <img src="images/logo.png" width="100px" height="100px"   ></div>
              
               <div class="social-top" col-md-6 col-sm-6>
                    <ul>
    <li style="margin-right:3px;"><a href="liste-serveurs-app.php" class="fa fa-angle-left"title="Précédent"  ></a></li>             
                     <?php  
                      session_start();
                      $r=session_id();
     if (strcmp( $_SESSION['type'], "Admin") == 0) {
          echo '<li style="margin-right:3px;"><a href="interfaceadmin.php" class="fa fa-home" title="Accueil"></a></li>';
          echo '<li><a href="liste-compte.php" class="fa fa-users" title="Comptes"></a></li>';

            }
      if (strcmp( $_SESSION['type'], "User") == 0) {
          echo '<li><a href="interfaceuser.php" class="fa fa-home" title="Accueil" ></a></li>';
            }
           
    ?>
                        <li><a href="profile.php" class="fa fa-user" title="Profile"></a></li>
                        <li><a href="msg.php" class="fa fa-envelope" title="G-mail"></a></li>
                        <li><a href="statistiques.php" class="fa fa-signal" title="Statistiques"></a></li>
                        <li><a href="deconecte.php" class="fa fa-sign-out" title="Déconnexion"></a></li>
                    </ul>
                </div> 
                </div> 
         </header>
                         <div id="wrapper">
<div class="row" >
<div class="col-md-4">    
</div>
 <div class="col-md-4" >                             
            <div class="modal-dialog" style="margin-right:30px;">
           <div class="modal-content">
          <div class="modal-header" style="padding:35px 50px; background-color:#2B3856;">
      <td><img style="width:100px;height:100px; border-radius: 50% !important; margin-left:200px" 
        src="img/<?= $srv->avatar;?>"></td>
        </div>


          

 <div class="modal-body" style="padding:40px 50px;">
 
             <div class="form-group">
           <p class="form-control"><b style="color: #FF4500;">NOM : </b><?= $srv->nom;?></p>
          </div>
 
           <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">ID : </b> <?= $srv->idserveur;?></p>
          </div>
          <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">IP :</b> <?= $srv->IP;?></p>
          </div>
          <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">DNS :</b> <?= $srv->DNS;?></p>
          </div>
          <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">Emplacement :</b> <?= $srv->localisation;?></p>
          </div>
        
          <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">État :</b> <?= $srv->etat;?></p>
          </div>
           <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">Passerelle :</b> <?= $srv->passerelle;?></p>
          </div>
  
   <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">Durée de la garantie :</b> <?= $srv->dureegarantie;?></p>
          </div>
  
   <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">Dernière Modification :</b> <?= $srv->dernieremodification;?></p>
          </div>
  
   <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">Type :</b> <?= $srv->type;?></p>
          </div>
  
   <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">Marque :</b> <?= $srv->marque;?></p>
          </div>
  
   <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">Modèle :</b> <?= $srv->typeos;?></p>
          </div>
  
   <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">MAC :</b> <?= $srv->adresseMAC;?></p>
          </div>
  
   <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">RAM :</b> <?= $srv->RAM;?></p>
          </div>
  
   <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">CPU :</b> <?= $srv->CPU;?></p>
          </div>
            <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">Espace disque :</b> <?= $srv->espacedisque;?></p>
          </div>
  
   <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">Nombre de Cartes Réseaux :</b> <?= $srv->nbrcartesreseaux;?></p>
          </div>
            <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">Système d'exploitation :</b> <?= $srv->OS;?></p>
          </div>
  
   <div class="form-group">
           <p for="usrname" class="form-control"> <b style="color: #FF4500;">Version de l'antivirus :</b> <?= $srv->versionantivirus;?></p>
          </div>
  
  

              

</div>
</div>
</div>
</div>
</div>
</div>




                    
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="js1/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js1/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js1/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="js1/dataTables/jquery.dataTables.js"></script>
    <script src="js1/dataTables/dataTables.bootstrap.js"></script>


    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

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

         <!-- CUSTOM SCRIPTS -->
    <script src="js1/custom.js"></script>
    
   
</body>
</html>
