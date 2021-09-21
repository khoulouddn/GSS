<?php 

$bdd= new PDO("mysql:host=localhost;dbname=gss;charset=utf8","root","");
$conn = mysqli_connect("localhost", "root", "", "gss"); 


if (isset($_POST['env2']) ){
  $id = $_GET['srv'];

  if(!empty(trim($_POST['idap']))){

$recherche1="SELECT `idserveur` FROM `serveur relier` WHERE `idserveur`='".$_POST['idap']."'"; 
$rs1=mysqli_query($conn,$recherche1);

if(mysqli_num_rows($rs1)>0){ 
echo "<script> alert('tu peux pas ajouter un serveur  deux fois'); </script> ";
}

if (mysqli_num_rows($rs1)<=0) {
  if (strcmp( $_POST['etatap'], "connecté") == 0) {$h="src.png";}else{$h="srn.png";}

 $requete8=$bdd->prepare('INSERT INTO `serveur relier`( `idserveur`,`nom`,`IP`,`DNS`,`etat`,`localisation`,`passerelle`,
  `dernieremodification`,`dureegarantie`,`typeserveur`,`avatar`,`marque`,`type`,`adresseMAC`,`RAM`,`CPU`,`espacedisque`,
  `nbrcartesreseaux`,`OS`, `typeos`,`versionantivirus`,`serveur_idserveur`,`caracteristiques_idcaracteristiques`) 
  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
 $requete8->execute(array($_POST['idap'],$_POST['nomap'],$_POST['ipap'],$_POST['dnsap'],$_POST['etatap'],$_POST['empap'],
  $_POST['pasap'],$_POST['map'],$_POST['gap'],'relier',$h,$_POST['marap'],$_POST['typeap'],$_POST['macap'],$_POST['ramap'],
  $_POST['cpuap'],$_POST['ddap'],$_POST['crap'],$_POST['osap'],$_POST['modap'],$_POST['avap'],$id,'1'));
 $requete2=$requete8->fetch();


echo "<script> alert('le serveur  a ete bien ajouter'); </script>";
}
}
header("Location:serveur-app-rel.php?srv=$id");
}


if (isset($_POST['env1']) ){
  $id = $_GET['srv'];

if(!empty(trim($_POST['ido']))){
$recherche="SELECT `idserveur` FROM `serveur` WHERE `idserveur`='".$_POST['ido']."'"; 
$rs=mysqli_query($conn,$recherche);

if(mysqli_num_rows($rs)>0){ 
$query ="SELECT * FROM `serveur` Join`caracteristiques`  WHERE `idserveur` LIKE `serveur_idserveur` AND 
`idserveur`='".$_POST['ido']."' " ;
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
}
$query1 ="SELECT * FROM `serveur` Join`caracteristiques`  WHERE `idserveur` LIKE `serveur_idserveur` AND 
`idserveur`='".$_POST['ido']."' " ;
$stat1 = $bdd->query($query1);
$tab1 = $stat1->fetchAll ();
foreach($tab1 as $row)
{
  $i=$row["idcaracteristiques"];
}
 $requete=$bdd->prepare('INSERT INTO `serveur relier`( `idserveur`,`nom`,`IP`,`DNS`,`etat`,`localisation`,`passerelle`,
  `dernieremodification`,`dureegarantie`,`typeserveur`,`avatar`,`marque`,`type`,`adresseMAC`,`RAM`,`CPU`,`espacedisque`,
  `nbrcartesreseaux`,`OS`,  `typeos`,`versionantivirus`,`serveur_idserveur`,`caracteristiques_idcaracteristiques`) 
  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
 $requete->execute(array($l1,$l2,$l3,$l4,$l5,$l6,$l7,$l8,$l9,$l10,$l11,$l12,$l13,$l14,$l15,$l16,$l17,$l18,$l19,$l20,$l21,$id,$i));
 $requete1=$requete->fetch();
}
}
header("Location:serveur-app-rel.php?srv=$id");
}



?> 

<!DOCTYPE html>
<html style="font-size: 85%;">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GSS</title>
   <link href="css1/bootstrap1.css" rel="stylesheet" />
     <link href="css1/style1.css" rel="stylesheet" />
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
          <!--AJAX-->
     <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" /> -->
     <script rel="stylesheet" href="vendor/bootstrap/js/bootstrap.min.js"></script> 
     <link href="css/modal.css" rel="stylesheet" />
     <script src="css/modal.js"></script>
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
                      session_start();
                      $r=session_id();
      if (strcmp( $_SESSION['type'], "Admin") == 0) {
          echo '<li style="margin-right:3px;"><a href="liste-serveurs-app.php" class="fa fa-angle-left" title="Précédent" ></a></li>';
          echo '<li style="margin-right:3px;"><a href="interfaceadmin.php" class="fa fa-home"title="Accueil" ></a></li>';
          echo '<li><a href="liste-compte.php" class="fa fa-users" title="Comptes" ></a></li>';

            }
      if (strcmp( $_SESSION['type'], "User") == 0) {
          echo '<li style="margin-right:3px;"><a href="liste-serveurs-app.php" class="fa fa-angle-left" title="Précédent" ></a></li>';
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
<!-- le menu -->
   
<!-- wrapper pour pertie left -->
    <div id="wrapper">

  
        <div id="page-inner">
<?php
if (strcmp( $_SESSION['type'], "Admin") == 0) {
        echo '
        <div  style="margin-left: 1350px;">
<button type="button" data-toggle="modal" data-target="#myModal8" style="padding:1px 1px 1px 1px; border-radius: 30%;"  >
   <img style="width:28px;height:26px; border-radius: 50% ;" src="img/add.png">   </button> 
   <button type="button" data-toggle="modal" data-target="#myModala" style="padding:1px 1px 1px 1px; border-radius: 30%;"  >
   <img style="width:28px;height:26px; border-radius: 50% ;" src="img/add1.png">   </button>   
<button type="button"  name="btn_delete" id="btn_delete" style="padding:1px 1px 1px 1px; border-radius: 30%;" >
 <img style="width:28px;height:26px; border-radius: 50% ;" src="img/delete.png"></button>
                          </div>' ; } ?>
<div style="text-align: center; color: #2b3856;"> 
  <b style="font-size:40px;">SERVEURS RELIÉS</b></div>
                                           <div class="row">
                                              <div class="col-md-12">
                                                <div class="panel panel-default">
                                                <div class="panel-body">
                                                <div class="table-responsive" style="overflow-x:scroll;">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                  <thead style="color:#2b3856;">
                                                                       <tr>
                                                                       
          <?php
if (strcmp( $_SESSION['type'], "Admin") == 0) {
        echo '<th><img style="width:26px;height:24px; " src="img/trash.png"></th>' ; } ?>
           <th><img style="width:30px;height:32px; " src="img/server1.png"> </th>
          <th>Nom</th>
          <th>ID</th>
          <th>IP</th>
          <th>DNS</th>
          <th>MAC</th>
          <th>RAM</th>
          <th>CPU</th>
          <th>Espace disque</th>      
          <th>Autres </th>
     <?php
if (strcmp( $_SESSION['type'], "Admin") == 0) {
        echo '<th><i class="fa fa-pencil"></th>' ; } ?>                                                                 

                                                                        </tr>
                                                                      </thead>

                                                                        <tbody>
                                                                      
<?php
$bdd= new PDO("mysql:host=localhost;dbname=gss;charset=utf8","root","");
$conn = mysqli_connect("localhost", "root", "", "gss"); 
$query = "SELECT * FROM `serveur relier`  WHERE `serveur_idserveur` ='".$_GET['srv']."'" ;
$stat = $bdd->query($query);
$tab = $stat->fetchAll ();
foreach($tab as $row)
{
echo "<tr>";
if (strcmp( $_SESSION['type'], "Admin") == 0) {
echo  '<td> <input type="checkbox" name="chc[]" value="'.$row["idserveur"]; echo'"> </td>';}
echo '<td><img style="width:35px;height:35px; border-radius: 50% !important;" src="img/' .$row["avatar"]; echo '"></td>';
echo '<td>' .$row["nom"]; echo '</td>';
echo '<td>' .$row["idserveur"]; echo '</td>';
echo '<td>' .$row["IP"]; echo '</td>';
echo '<td>' .$row["DNS"]; echo '</td>';
echo '<td>' .$row["adresseMAC"]; echo '</td>';
echo '<td>' .$row["RAM"]; echo '</td>';
echo '<td>' .$row["CPU"]; echo '</td>';
echo '<td>' .$row["espacedisque"]; echo '</td>';
echo' <td> <a href="cara-app -rel.php?caraa1='.$row['idserveur'].'"class ="btn btn-default" ><i>caracteristiques</i></td>';
if (strcmp( $_SESSION['type'], "Admin") == 0) {
echo '<td> <a href="modifier-srv-relapp.php?modpp='.$row['idserveur'].'"  data-toggle="modal1" data-target="#my">
 <img style="width:33px;height:30px; border-radius: 50% ;" src="img/edit.png"></button></td>';}
echo "</tr>";
}
?>
                                                                  
                          </tr>

                          </tbody>
                          </table>
                                 </div>
                                 </div>
                                 </div>                                          
                                 </div>
                                 </div>
                                 </div>
                                 </div>
                                 </div>
                                 </div>


         <script>
$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
  if(confirm("Voulez-vous vraiment supprimer ces informations?"))
  {
   var id = [];
   
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("Sélectionner un élément!!!");
   }
   else
   {
    $.ajax({
     url:'supprimer-srv -rel.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
     location.reload();
      }
     });
   }
   
  }
  else
  {
   return false;
  }

 });
});
</script>



    




                      








                         <div class="row">
                        <div class="col-md-6">   
                        <div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                        style="margin-top:10%;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header" style="padding:35px 50px; background-color:#2B3856;">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 style="font-size:20px;color:white;text-align: center;">
                             <span class="fa fa-user-plus"></span><i><b>Ajouter un serveur</b></i></h4>
                            </div>

                     <div class="modal-body" style="padding:40px 50px;">
                     <form role="form" action="" method="post">
          <div class="form-group">
           <label for="usrname" >ID</label>
           <input type="text" class="form-control" placeholder="id" name="ido" required>
          </div>
            
         <button type="submit" class="btn btn-success" name="env1"> Ajouter</button>
               <br><br>
        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">Annuler</button>
    
                           </form>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div> 




                     <div class="row">
                        <div class="col-md-6">   
                        <div class="modal fade" id="myModala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header" style="padding:35px 50px; background-color:#2B3856;">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 style="font-size:20px;color:white;text-align: center;">
                             <span class="fa fa-user-plus"></span><i><b>Ajouter un serveur</b></i></h4>
                            </div>

                     <div class="modal-body" style="padding:40px 50px;">
                     <form role="form" action="" method="post">
           
          <div class="form-group">
           <label for="usrname"> Nom</label>
           <input type="text" class="form-control" placeholder="nom" name="nomap">
          </div>

          <div class="form-group">
           <label for="usrname" >ID</label>
           <input type="text" class="form-control" placeholder="id" name="idap" required>
          </div>
   
          <div class="form-group">
           <label for="usrname" >type</label>
           <input type="text" class="form-control" placeholder="type" name="typeap">
          </div>

           <div class="form-group">
           <label for="usrname" >Marque</label>
           <input type="text" class="form-control" placeholder="marque" name="marap">
          </div>

           <div class="form-group">
           <label for="usrname" >Emplacement</label>
           <input type="text" class="form-control" placeholder="emplacement" name="empap">
          </div>

           <div class="form-group">
           <label for="usrname" >Modèle</label>
           <input type="text" class="form-control" placeholder="Modele" name="modap">
          </div>

           <div class="form-group">
           <label for="usrname" >adresse MAC</label>
           <input type="text" class="form-control" placeholder="mac" name="macap">
          </div>

           <div class="form-group">
           <label for="usrname" >RAM</label>
           <input type="number" class="form-control" placeholder="ram" name="ramap">
          </div>

           <div class="form-group">
           <label for="usrname" >CPU</label>
           <input type="text" class="form-control" placeholder="cpu" name="cpuap">
          </div>

           <div class="form-group">
           <label for="usrname" >adresse IP</label>
           <input type="text" class="form-control" placeholder="ip" name="ipap">
          </div>

           <div class="form-group">
           <label for="usrname" >DNS</label>
           <input type="text" class="form-control" placeholder="dns" name="dnsap">
          </div>

           <div class="form-group">
           <label for="usrname" >État</label>
           <select class="form-control"  name="etatap">
                  <option> </option> 
                  <option>connecté</option>
                  <option>non connecté</option>
            </select>
          </div></br>

           <div class="form-group">
           <label for="usrname" >Passerelle</label>
           <input type="text" class="form-control" placeholder="passerell" name="pasap">
          </div>

           <div class="form-group">
           <label for="usrname" >Durée de la garantie</label>
           <input type="text" class="form-control" placeholder="garantie" name="gap">
          </div>

           <div class="form-group">
           <label for="usrname" >Dernière modification</label>
           <input type="date" class="form-control" placeholder="dernière-modification" name="map">
          </div>

           <div class="form-group">
           <label for="usrname" >Espace disque dur</label>
           <input type="text" class="form-control" placeholder="disque dur" name="ddap">
          </div>

           <div class="form-group">
           <label for="usrname" >Nombre de Cartes Réseaux</label>
           <input type="number" class="form-control" placeholder="carte reseau" name="crap">
          </div>

           <div class="form-group">
           <label for="usrname" >Système D'exploitation</label>
           <select class="form-control"  name="osap"> 
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
           <label for="usrname" > Version de l'Antivirus </label>
           <input type="text" class="form-control" placeholder="antivirus" name="avap">
          </div>

              
            
        <button type="submit" class="btn btn-success" name="env2"> Ajouter</button>
               <br><br>
        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">Annuler</button>
    
                           </form>
                                </div>
                                </div>
                                </div>
                                </div>
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


