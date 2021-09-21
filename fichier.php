<?php
$bdd= new PDO("mysql:host=localhost;dbname=gss;charset=utf8","root","");
$conn = mysqli_connect("localhost", "root", "", "gss"); 

if (isset($_POST['envoif']) ){
  $idf = $_GET['aj'];
 if( !empty(trim($_POST['nomf'])))
 {

$recherche="SELECT `idfichierpartage` FROM `fichier partage` WHERE `nomfichier`='".$_POST['nomf']."'"; 
$rs=mysqli_query($conn,$recherche);
if(mysqli_num_rows($rs)>0){ 
echo "<script> alert('tu peux pas ajouter le fichier  deux fois'); </script> ";
}

if (mysqli_num_rows($rs)<=0) {
   $requete=$bdd->prepare('INSERT INTO `fichier partage`( `nomfichier`, `chemin`,`membre`,`le`,`serveur de partage_idserveur`) VALUES (?,?,?,?,?)');
 $requete->execute(array($_POST['nomf'],$_POST['cheminf'],$_POST['memf'],$_POST['datef'],$idf));
 $requete1=$requete->fetch();
 echo "<script>alert('le fichier  a ete bien ajouter');</script>";

 }
}
header("Location:fichier.php?aj=$idf");
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
              <li style="margin-right:1px;"><a href="liste-serveurs-par.php" class="fa fa-angle-left" title="Précédent"></a></li>
                        <?php  
                      session_start();
                      $r=session_id();
     if (strcmp( $_SESSION['type'], "Admin") == 0) {
          echo '<li style="margin-right:3px;"><a href="interfaceadmin.php" class="fa fa-home" title="Accueil" ></a></li>';
          echo '<li><a href="liste-compte.php" class="fa fa-users" title="Comptes"></a></li>';

            }
      if (strcmp( $_SESSION['type'], "User") == 0) {
          echo '<li><a href="interfaceuser.php" class="fa fa-home" title="Accueil"></a></li>';


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
      <div id="page-inner">
        <?php
if (strcmp( $_SESSION['type'], "User") == 0) {
        echo '<div style="margin-left:1450px;">
    <button type="button" data-toggle="modal" data-target="#myModala"style="padding:1px 1px 1px 1px; border-radius: 30%;"> 
    <img style="width:28px;height:26px; border-radius: 50% ;" src="img/add.png"></button> 
                          </div>';
                      } ?>  

                       <?php
if (strcmp( $_SESSION['type'], "Admin") == 0) {
        echo '<div style="margin-left:1400px;">
    <button type="button" data-toggle="modal" data-target="#myModala"style="padding:1px 1px 1px 1px; border-radius: 30%;"> 
    <img style="width:28px;height:26px; border-radius: 50% ;" src="img/add.png"></button> 
<button type="button"style="padding:1px 1px 1px 1px; border-radius: 30%;" name="btn_delete" id="btn_delete" >
         <img style="width:28px;height:26px; border-radius: 50% ;" src="img/delete.png"></button>
                          </div>';
                      } ?>  


<div style="text-align: center; color: #2b3856;"> 
  <b style="font-size:40px;">FICHIERS DE PARTAGE</b></div>
                                             

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
    echo'<th><img style="width:26px;height:24px; " src="img/trash.png"></th>';}?>                                                       
          <th>Nom</th>
          <th>Chemin Partage</th> 
          <th>Partagé Par</th>
          <th> Partagé Le</th>
          
          <?php                                                                  
  if (strcmp( $_SESSION['type'], "Admin") == 0) {
    echo'<th>Atribué à</th>
    <th><i class="fa fa-pencil"></i></th>';}?>
                                                                        </tr>
                                                                      </thead>
                            <tbody  class="warning">
 <?php
$bdd= new PDO("mysql:host=localhost;dbname=gss;charset=utf8","root","");
$conn = mysqli_connect("localhost", "root", "", "gss"); 
$query = "SELECT * FROM `fichier partage`  WHERE `serveur de partage_idserveur` = '".$_GET['aj']."'" ;
$stat = $bdd->query($query);
$tab = $stat->fetchAll ();
foreach($tab as $row)
{
echo "<tr>";
if (strcmp( $_SESSION['type'], "Admin") == 0) {
  echo  '<td> <input type="checkbox" name="chc[]" value="'.$row["idfichierpartage"]; echo'"> </td>';}
echo '<td>' .$row["nomfichier"]; echo '</td>';
echo '<td>' .$row["chemin"]; echo '</td>';
echo '<td>' .$row["membre"]; echo '</td>';
echo '<td>' .$row["le"]; echo '</td>';
if (strcmp( $_SESSION['type'], "Admin") == 0) {
  echo '<td> <a href="groupe-par.php?fif='.$row["idfichierpartage"].'"class ="btn btn-default" ><i>groupe</i></td>';
  echo '<td> <a href="modifier-fichier.php?modifief='.$row['idfichierpartage'].'" data-toggle="modal1" data-target="#my">
<img style="width:33px;height:30px; border-radius: 50% ;" src="img/edit.png"></button></td>';}
echo "</tr>";
}
?> 
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
     url:'supprimer-fichier.php',
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
                <div class="modal fade" id="myModala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                style="margin-top:2%;">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px; background-color:#2B3856;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 style="font-size:20px;color:white;text-align: center;"><span class="fa fa-user-plus"></span><i><b>Ajouter Fichier</b></i></h4></div>

                <div class="modal-body" style="padding:40px 50px;">
                <form role="form" action="" method="post">
          
          <div class="form-group">
           <label for="usrname">NOM</label>
           <input type="text" class="form-control" placeholder="nom" name="nomf" required>
          </div>

          <div class="form-group">
           <label for="usrname">CHEMIN</label>
           <input type="text" class="form-control" placeholder="groupe/membre/nom_fichier" name="cheminf">
          </div>

          <div class="form-group">
           <label for="usrname">Partagé par</label>
           <input type="text" class="form-control" placeholder="membre"  name="memf" required>
          </div>

            <div class="form-group">
           <label for="usrname">Le</label>
           <input type="date" class="form-control" name="datef">
          </div></br>

        <button type="submit" class="btn btn-success" name="envoif"> Ajouter</button>
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
