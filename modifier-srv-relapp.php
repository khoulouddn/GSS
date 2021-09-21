<?php
$bdd= new PDO("mysql:host=localhost;dbname=gss;charset=utf8","root","");
$conn = mysqli_connect("localhost", "root", "", "gss"); 

$id = $_GET['modpp'];
$sql = "SELECT * FROM `serveur relier` WHERE `idserveur`=:id " ;
$statement = $bdd->prepare($sql);
$statement->execute([':id' => $id]);
$srv = $statement->fetch(PDO::FETCH_OBJ);
##########################################

if (isset($_POST['mods'])) {

if(!empty(trim($_POST['id']))){ 

$requete8=$bdd->prepare('UPDATE `serveur relier` SET `idserveur`=?,`nom`=?,`IP`=?, `DNS`=? ,`etat`=? ,`localisation`=? ,`passerelle`=? ,`dernieremodification`=? ,`dureegarantie`=? ,`marque`=?,`type`=?,`adresseMAC`=?, `RAM`=? ,`CPU`=? ,`espacedisque`=? ,
  `nbrcartesreseaux`=? ,`OS`=? ,`typeos`=? ,`versionantivirus`=?  WHERE `idserveur`=?');
$requete8->execute(array($_POST['id'],$_POST['nom'],$_POST['ip'],$_POST['dns'],$_POST['etat'],$_POST['loc'],$_POST['pas'],
  $_POST['der'],$_POST['gar'],$_POST['mar'],$_POST['type'],$_POST['mac'],$_POST['ram'],$_POST['cpu'],$_POST['dd'],$_POST['res'],
  $_POST['os'],$_POST['mod'],$_POST['ver'],$id));
$requete9=$requete8->fetch();

echo '<script>alert("la modification est bien effectuée");</script>';

}
 
$query ="SELECT * FROM `serveur relier` WHERE `idserveur`='".$_GET['modpp']."'";
$stat = $bdd->query($query);
$tab = $stat->fetchAll ();
foreach($tab as $row)
{
$v=$row["serveur_idserveur"]; 
}

header("Location:Serveur-app-rel.php?srv=$v");
}
?>  
<!DOCTYPE html>
<html style="font-size: 85%;">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>SONATRACH</title>

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
                        <?php  
$query1="SELECT * FROM `serveur relier` WHERE `idserveur`='".$_GET['modpp']."'";
$stat1 = $bdd->query($query1);
$tab1= $stat1->fetchAll ();
foreach($tab1 as $row)
{
$n=$row["serveur_idserveur"]; 
}
                      session_start();
                      $r=session_id();
      if (strcmp( $_SESSION['type'], "Admin") == 0) {
         echo '<li style="margin-right:3px;"><a href="serveur-app-rel.php?srv='.$n.'" class="fa fa-angle-left" title="Précédent"></a></li>';
          echo '<li style="margin-right:3px;"><a href="interfaceadmin.php" class="fa fa-home" title="Accueille" ></a></li>';
          echo '<li><a href="liste-compte.php" class="fa fa-users" title="Comptes" ></a></li>';

            }
      if (strcmp( $_SESSION['type'], "User") == 0) {
           echo '<li style="margin-right:3px;"><a href="serveur-app-rel.php?srv='.$n.'" class="fa fa-angle-left" title="Précédent"></a></li>';
          echo '<li><a href="interfaceuser.php" class="fa fa-home"  title="Accueille"></a></li>';
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


<div id="wrapper">
<div class="row" >
<div class="col-md-4">    
</div>
 <div class="col-md-4">                             
            <div class="modal-dialog">
           <div class="modal-content">
          <div class="modal-header" style="padding:35px 50px; background-color:#2B3856;">
          <h4 style="font-size:20px;color:white;text-align: center;"><i><b>modifier Serveur</b></i></h4>
        </div>

 <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="" method="post">  
 
 <div class="form-group">
           <label for="usrname"> Nom</label>
           <input type="text" class="form-control" placeholder="nom" name="nom" value="<?= $srv->nom;?>">
          </div>

          <div class="form-group">
           <label for="usrname" >ID</label>
           <input type="text" class="form-control" placeholder="id" name="id" required value="<?= $srv->idserveur;?>">
          </div>
   
          <div class="form-group">
           <label for="usrname" >type</label>
           <input type="text" class="form-control" placeholder="type" name="type"value="<?= $srv->type;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >Marque</label>
           <input type="text" class="form-control" placeholder="marque" name="mar" value="<?= $srv->marque;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >Emplacement</label>
           <input type="text" class="form-control" placeholder="emplacement" name="loc" value="<?= $srv->localisation;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >Modele</label>
           <input type="text" class="form-control" placeholder="Modele" name="mod" value="<?= $srv->typeos;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >address MAC</label>
           <input type="text" class="form-control" placeholder="mac" name="mac" value="<?= $srv->adresseMAC;?>"
            value="<?= $srv->typeos;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >RAM</label>
           <input type="number" class="form-control" placeholder="ram" name="ram" value="<?= $srv->RAM;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >CPU</label>
           <input type="text" class="form-control" placeholder="cpu" name="cpu" value="<?= $srv->CPU;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >address IP</label>
           <input type="text" class="form-control" placeholder="ip" name="ip" value="<?= $srv->IP;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >DNS</label>
           <input type="text" class="form-control" placeholder="dns" name="dns" value="<?= $srv->DNS;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >Etat</label>
           <select class="form-control" class="form-control"  name="etat" value="<?= $srv->etat;?>"> 
                  <option>connecté</option>
                  <option>non connecté</option>
            </select>
          </div></br>

           <div class="form-group">
           <label for="usrname" >Passerell</label>
           <input type="text" class="form-control" placeholder="passerell" name="pas" value="<?= $srv->passerelle;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >Durée-Garantie</label>
           <input type="text" class="form-control" placeholder="garantie" name="gar" value="<?= $srv->dureegarantie;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >Derniere Modification</label>
           <input type="date" class="form-control" placeholder="dernière-modification" name="der" 
           value="<?= $srv->dernieremodification;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >Espace Disque Dur</label>
           <input type="text" class="form-control" placeholder="disque dur" name="dd" value="<?= $srv->espacedisque;?>">
          </div>

           <div class="form-group">
           <label for="usrname" >Nombre Carte Reseau</label>
           <input type="number" class="form-control" placeholder="carte reseau" name="res" value="<?= $srv->nbrcartesreseaux;?>">
          </div>

            <div class="form-group">
           <label for="usrname" >Systeme D'expoitation</label>
           <select class="form-control"  name="os" value="<?= $srv->OS;?>"> 
                  <option> </option>
                  <option>Windows10</option>
                  <option>Windows8</option>
                  <option >Windows7</option>
                  <option>WindowsXP pro</option>
                  <option>Windows98</option>
                  <option>Windows95</option>
                  <option>Windows2000</option>
                  <option>Linux</option>
                  <option>Linux Mint</option>
                  <option>Arch Linux</option>
                  <option>Red Hat Linux</option>
                  <option>Linux Deepin</option>
                  <option>Xandors Linux</option>
                  <option>Ubuntu</option>
                  <option>Debian</option>
                  <option>Macintoch OSX</option>
                  <option>Mac OS XLeopard</option>
                  <option>Mac OS XLion</option>
                  <option>IOS7</option>
                  <option>IOS X</option>
                  <option>Android</option>
                  <option>Google Chrome OS</option>
                  <option>Java OS</option>
                  </select>
          </div> </br>


           <div class="form-group">
           <label for="usrname" > Version AntiVirus </label>
           <input type="text" class="form-control" placeholder="antivirus" name="ver" value="<?= $srv->versionantivirus;?>">
          </div>

        <button type="submit" class="btn btn-success" name="mods">Modifier</button>
        <br><br>
        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">Annuler</button>

</form>
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