



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSS</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
     <link href="page/css/bootstrap.min.css" rel="stylesheet">
    <link href="page/css/font-awesome.min.css" rel="stylesheet">
    <link href="page/css/animate.min.css" rel="stylesheet"> 
    <link href="page/css/lightbox.css" rel="stylesheet"> 
	<link href="page/css/main.css" rel="stylesheet">
	<link href="page/css/responsive.css" rel="stylesheet">
      
</head><!--/head-->

<body style="background-image:url(page/images/room.png); background-size:100%;background-repeat:no-repeat; ">
	<div style="width: 80% ; margin: 4% 10% 5% 10%"> 
		<img src="page/images/pc.png" style="width:100%;">
       
     <div style=" position:relative ; margin-top:-30%" >
     	<h3 style="color:#8C001A; margin-left:410px;"> <b >Bienvenu dans Votre Salle Machine Virtuelle</b></h3>
     	<br>
     	<br>
     	<br>
<?php 
$bdd= new PDO("mysql:host=localhost;dbname=gss;charset=utf8","root","");
$conn = mysqli_connect("localhost", "root", "", "gss"); 
$id = $_GET['s'];
echo'<a href="schema.php?s='.$id.'"class="btn btn-common" style="color:#8C001A; margin-left:540px;" >'; 
     ?>
                 <b class="fa fa-key">Visiter</b></a>
 </div>
 </div>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>
