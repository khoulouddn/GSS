
<!DOCTYPE html>
<html style="font-size: 85%;">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>GSS</title>

    <link href="css1/bootstrap1.css" rel="stylesheet" />
     <link href="css1/style1.css" rel="stylesheet" />
     <link href="css/schema.css" rel="stylesheet" />
     <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
     <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
     <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100">
     <link rel="stylesheet" href="http://fonts.googleapis.ccss?family=Roboto:400,400italic,300italic,300,500,500italic,700,900">  
     <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="css/font-awesome.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/templatemo-misc.css">
     <link rel="stylesheet" href="css/templatemo-style0.css"> 
     <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
     <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <link href="js1/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
      <style type="text/css">
               a.btn-left, .top-header .social-top ul li a, .main-header .menu-wrapper a.toggle-menu {
                                    border: 2px solid #5E7D7E;
                                    border-radius: 40%;}
        </style>
         
</head>

<body style="background-color: white;">
       
       <section id="pageloader">
            <div class="loader-item fa fa-spin colored-border"></div>
        </section> 

        <header class="site-header container-fluid">
            <div class="top-header">
                
               <div style="padding: 5px 0 5px 5px;">   <img src="images/logo.png" width="100px" height="100px"   ></div>
              
               <div class="social-top" col-md-6 col-sm-6>
                    <ul>
                   <?php  
                      session_start();
                     $r=session_id();
     if (strcmp( $_SESSION['type'], "Admin") == 0) {
         echo '<li style="margin-right:3px;"><a href="interfaceadmin.php" class="fa fa-home" title="Accueil" ></a></li>';
        echo '<li><a href="liste-compte.php" class="fa fa-users" title="Comptes" ></a></li>';

            }
     if (strcmp( $_SESSION['type'], "User") == 0) {
         echo '<li><a href="interfaceuser.php" class="fa fa-home" title="Accueil" ></a></li>';
            }
           
    ?> 
                        <li><a href="profile.php" class="fa fa-user" title="Profile"></a></li>
                        <li><a href="msg.php" class="fa fa-envelope" title="Gmail"></a></li>
                        <li><a href="statistiques.php" class="fa fa-signal" title="Statistiques"></a></li>
                        <li><a href="deconecte.php" class="fa fa-sign-out" title="Déconnexion"></a></li>
                    </ul>
                </div> 
                </div> 
         </header>
  <div style="  background-color: #efefef;">
    <b style="font-size:40px; color:#2b3856; margin-left:400px;">SCHEMA DES SERVEURS</b>
  </div>
  <div>
<?php
$bdd= new PDO("mysql:host=localhost;dbname=gss;charset=utf8","root","");
$conn = mysqli_connect("localhost", "root", "", "gss"); 
$query ="SELECT * FROM `serveur` Join`caracteristiques`  WHERE `idserveur` LIKE `serveur_idserveur` AND 
`idserveur`='".$_GET['s']."' " ;
$stat = $bdd->query($query);
$tab = $stat->fetchAll ();
foreach($tab as $row)
{
$l1=$row["idserveur"];
$l2=$row["nom"];
$l3=$row["IP"];
$l4=$row["DNS"];
$l5=$row["etat"];
$l6=$row["localisation"];
$l7=$row["passerelle"];
$l8=$row["dernieremodification"];
$l9=$row["dureegarantie"];
$l10=$row["typeserveur"];
$l11=$row["avatar"];
$l12=$row["marque"];
$l13=$row["type"];
$l14=$row["adresseMAC"]; 
$l15=$row["RAM"]; 
$l16=$row["CPU"]; 
$l17=$row["espacedisque"];
$l18=$row["nbrcartesreseaux"];
$l19=$row["OS"];
$l20=$row["typeos"];
$l21=$row["versionantivirus"]; 

    if (strcmp( $l10, "Application") == 0) {
    echo '<div>
    <img src="images/id1.png" style="margin-left:160px; margin-top:4px; width:16px; height:16px;">
    <h2 style="margin-left: 190px; position:relative; margin-top:-1.2%;">'.$row["idserveur"];echo '</h2>
</div>
  <div>
    <img src="images/loc2.png" style="margin-left:160px; margin-top:5px; width:16px; height:18px;">
    <h2 style="margin-left: 190px; position:relative; margin-top:-1.2%;">'.$row["localisation"];echo '</h2>
</div>';


echo'<ul style="margin-left:80px;"> 
<li> <a href="liste-serveurs-app.php"> <img src="images/server.png" style="margin-left:100px; margin-top:15px;" ></a>
    <ul>';
    echo '<li><a style="color: black;"><b>ID : </b>'.$row["idserveur"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>nom: </b>'.$row["nom"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>ip: </b>'.$row["IP"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>dns: </b>'.$row["DNS"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>etat: </b>'.$row["etat"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>localisation: </b>'.$row["localisation"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>passrelle: </b>'.$row["passerelle"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>date derniere modification: </b>'.$row["dernieremodification"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>duree garantie: </b>'.$row["dureegarantie"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>serveur: </b>'.$row["typeserveur"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>marque: </b>'.$row["marque"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>type: </b>'.$row["type"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>@mac: </b>'.$row["adresseMAC"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>ram: </b>'.$row["RAM"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>cpu: </b>'.$row["CPU"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>espace disque: </b>'.$row["espacedisque"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>nbr cartes reseaux: </b>'.$row["nbrcartesreseaux"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>os: </b>'.$row["OS"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>modele: </b>'.$row["typeos"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>version antivirus: </b>'.$row["versionantivirus"];echo'</a></li>';
    echo"</ul></li></ul> </div>"; }


  if (strcmp( $l10, "Partage") == 0) {
        echo '<div>
    <img src="images/id1.png" style="margin-left:160px; margin-top:4px; width:16px; height:16px;">
    <h2 style="margin-left: 190px; position:relative; margin-top:-1.2%;">'.$row["idserveur"];echo '</h2>
</div>
  <div>
    <img src="images/loc2.png" style="margin-left:160px; margin-top:5px; width:16px; height:18px;">
    <h2 style="margin-left: 190px; position:relative; margin-top:-1.2%;">'.$row["localisation"];echo '</h2>
</div>';


echo'<ul style="margin-left:80px;"> 
<li> <a href="liste-serveurs-app.php"> <img src="images/server.png" style="margin-left:100px; margin-top:15px;" ></a>
    <ul>';
    echo '<li><a style="color: black;"><b>ID : </b>'.$row["idserveur"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>nom: </b>'.$row["nom"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>ip: </b>'.$row["IP"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>dns: </b>'.$row["DNS"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>etat: </b>'.$row["etat"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>localisation: </b>'.$row["localisation"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>passrelle: </b>'.$row["passerelle"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>date derniere modification: </b>'.$row["dernieremodification"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>duree garantie: </b>'.$row["dureegarantie"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>serveur: </b>'.$row["typeserveur"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>marque: </b>'.$row["marque"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>type: </b>'.$row["type"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>@mac: </b>'.$row["adresseMAC"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>ram: </b>'.$row["RAM"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>cpu: </b>'.$row["CPU"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>espace disque: </b>'.$row["espacedisque"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>nbr cartes reseaux: </b>'.$row["nbrcartesreseaux"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>os: </b>'.$row["OS"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>modele: </b>'.$row["typeos"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>version antivirus: </b>'.$row["versionantivirus"];echo'</a></li>';
    echo"</ul></li></ul> </div>"; }

  }
?>
  <div>  
  <table class="table" style="border-color: white; border-width:0px;width:200px; margin-left:1000px; ">
                             
                                    <tbody>
<?php
 

$query1 ="SELECT * FROM `serveur relier` WHERE `serveur_idserveur`='".$_GET['s']."' " ;
$stat1 = $bdd->query($query1);
$tab1 = $stat1->fetchAll ();
foreach($tab1 as $row)
{
$l1=$row["idserveur"];
$l2=$row["nom"];
$l3=$row["IP"];
$l4=$row["DNS"];
$l5=$row["etat"];
$l6=$row["localisation"];
$l7=$row["passerelle"];
$l8=$row["dernieremodification"];
$l9=$row["dureegarantie"];
$l10=$row["typeserveur"];
$l11=$row["avatar"];
$l12=$row["marque"];
$l13=$row["type"];
$l14=$row["adresseMAC"]; 
$l15=$row["RAM"]; 
$l16=$row["CPU"]; 
$l17=$row["espacedisque"];
$l18=$row["nbrcartesreseaux"];
$l19=$row["OS"];
$l20=$row["typeos"];
$l21=$row["versionantivirus"];
    if (strcmp( $l10, "Application") == 0) {
echo "<tr>";
echo '<td> <ul> <li> <a href="liste-serveurs-app.php"><img style="width:100px;height:100px; border-radius: 50% !important;" src="img/' .$row["avatar"]; echo '"> </a> <ul>';
    echo '<li><a style="color: black;"><b>ID : </b>'.$row["idserveur"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>nom: </b>'.$row["nom"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>ip: </b>'.$row["IP"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>dns: </b>'.$row["DNS"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>etat: </b>'.$row["etat"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>localisation: </b>'.$row["localisation"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>passrelle: </b>'.$row["passerelle"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>date derniere modification: </b>'.$row["dernieremodification"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>duree garantie: </b>'.$row["dureegarantie"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>serveur: </b>'.$row["typeserveur"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>marque: </b>'.$row["marque"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>type: </b>'.$row["type"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>@mac: </b>'.$row["adresseMAC"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>ram: </b>'.$row["RAM"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>cpu: </b>'.$row["CPU"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>espace disque: </b>'.$row["espacedisque"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>nbr cartes reseaux: </b>'.$row["nbrcartesreseaux"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>os: </b>'.$row["OS"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>modele: </b>'.$row["typeos"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>version antivirus: </b>'.$row["versionantivirus"];echo'</a></li>';

echo "</ul></li></ul> </td>"; 
echo '<td> <img src="images/id1.png" style="width:16px; height:16px; ">';
echo '<img src="images/loc2.png" style=" width:16px; height:18px; margin-top:5px;"></td>';
echo '<td><b style="margin-top:10px;">' .$row["idserveur"]; echo '</b>';
echo '<b style="margin-top:10px;">'.$row["localisation"]; echo '</b></td>';
echo "</tr>";     
    }

 if (strcmp( $l10, "Partage") == 0) {
echo "<tr>";
echo '<td> <ul> <li> <a href="liste-serveurs-par.php"><img style="width:100px;height:100px; border-radius: 50% !important;" src="img/' .$row["avatar"]; echo '"> </a> <ul>';
    echo '<li><a style="color: black;"><b>ID : </b>'.$row["idserveur"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>nom: </b>'.$row["nom"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>ip: </b>'.$row["IP"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>dns: </b>'.$row["DNS"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>etat: </b>'.$row["etat"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>localisation: </b>'.$row["localisation"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>passrelle: </b>'.$row["passerelle"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>date derniere modification: </b>'.$row["dernieremodification"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>duree garantie: </b>'.$row["dureegarantie"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>serveur: </b>'.$row["typeserveur"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>marque: </b>'.$row["marque"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>type: </b>'.$row["type"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>@mac: </b>'.$row["adresseMAC"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>ram: </b>'.$row["RAM"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>cpu: </b>'.$row["CPU"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>espace disque: </b>'.$row["espacedisque"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>nbr cartes reseaux: </b>'.$row["nbrcartesreseaux"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>os: </b>'.$row["OS"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>modele: </b>'.$row["typeos"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>version antivirus: </b>'.$row["versionantivirus"];echo'</a></li>';

echo "</ul></li></ul> </td>"; 
echo '<td> <img src="images/id1.png" style="width:16px; height:16px; ">';
echo '<img src="images/loc2.png" style=" width:16px; height:18px; margin-top:5px;"></td>';
echo '<td><b style="margin-top:10px;">' .$row["idserveur"]; echo '</b>';
echo '<b style="margin-top:10px;">'.$row["localisation"]; echo '</b></td>';
echo "</tr>";    
    }

 if (strcmp( $l10, "relier") == 0) {
echo "<tr>";
echo '<td> <ul> <li> <a href="serveur-app-rel.php?srv='.$row['serveur_idserveur'].'"><img style="width:100px;height:100px; border-radius: 50% !important;" src="img/' .$row["avatar"]; echo '"> </a> <ul>';
    echo '<li><a style="color: black;"><b>ID : </b>'.$row["idserveur"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>nom: </b>'.$row["nom"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>ip: </b>'.$row["IP"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>dns: </b>'.$row["DNS"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>etat: </b>'.$row["etat"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>localisation: </b>'.$row["localisation"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>passrelle: </b>'.$row["passerelle"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>date derniere modification: </b>'.$row["dernieremodification"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>duree garantie: </b>'.$row["dureegarantie"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>serveur: </b>'.$row["typeserveur"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>marque: </b>'.$row["marque"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>type: </b>'.$row["type"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>@mac: </b>'.$row["adresseMAC"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>ram: </b>'.$row["RAM"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>cpu: </b>'.$row["CPU"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>espace disque: </b>'.$row["espacedisque"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>nbr cartes reseaux: </b>'.$row["nbrcartesreseaux"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>os: </b>'.$row["OS"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>modele: </b>'.$row["typeos"];echo'</a></li>';
    echo '<li><a style="color: black;"><b>version antivirus: </b>'.$row["versionantivirus"];echo'</a></li>';

echo "</ul></li></ul> </td>"; 
echo '<td> <img src="images/id1.png" style="width:16px; height:16px; ">';
echo '<img src="images/loc2.png" style=" width:16px; height:18px; margin-top:5px;"></td>';
echo '<td><b style="margin-top:10px;">' .$row["idserveur"]; echo '</b>';
echo '<b style="margin-top:10px;">'.$row["localisation"]; echo '</b></td>';
echo "</tr>";     
    }


                                      
}
?>

                                    </tbody>
                                </table>
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