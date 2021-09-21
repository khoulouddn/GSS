<?php
  session_start();
$bdd= new PDO("mysql:host=localhost;dbname=gss;charset=utf8","root","");
if (isset($_POST['log']) ){
	
 if(isset($_POST['id']) && !empty(trim($_POST['id']))  && isset($_POST['pw']) && !empty(trim($_POST['pw']))) 
 {         
         
            $requete2=$bdd->prepare('SELECT * FROM compte WHERE idcompte= ? AND motdepasse= ? ');
           $requete2->execute(array($_POST['id'],$_POST['pw']));
           #rowCount compte le nbr de ligne du tableau retourné par la requetes Select
           $userexist=$requete2->rowCount();
           if($userexist ==1)
          { $userinfo = $requete2->fetch(); 
          	 $_SESSION['motdepasse']=$userinfo['motdepasse'];
              $_SESSION['idcompte']=$userinfo['idcompte'];
              $_SESSION['nom']=$userinfo['nom'];
              $_SESSION['type']=$userinfo['type'];
              $_SESSION['mail']=$userinfo['mail'];
               $_SESSION['service']=$userinfo['service'];
             

            if (strcmp($userinfo['type'], "Admin") == 0) {
            	header('Location:interfaceadmin.php');
            	  echo "Bienvenu <br>".$resultat['nom'];

            }
             if (strcmp($userinfo['type'], "User") == 0) {
            	header('Location:interfaceuser.php');
            	echo "Bienvenu <br>".$resultat['nom'];
            }
           } 
          
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>GSS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">
<!--===============================================================================================-->


<script >
		function showPass(){
			var pass=document.getElementById('pass');
			if (document.getElementById('check').checked) {
				pass.setAttribute('type','text');
			}else{
				pass.setAttribute('type','password');
               }
		}
	</script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt">
					<img src="images/log9.png" alt="IMG">
				</div>

				<form  method="POST" action=""  class="login100-form validate-form">
					<span class="login100-form-title">
						Connexion
					</span>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="id" placeholder="id d'utilisateur" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="pw" placeholder="mot de passe" id="pass" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input"><i style="color:#d1d0ce">afficher le mot de passe</i>
						<input type="checkbox" name="true" id="check" class="fa fa-check-square"  onclick="showPass();">
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="log">
							Se connecter
						</button>
					</div>
						<br> <br> <br> <br> <br>
						

					</div>

					

					
				</form>
			</div>
		</div>
		<p style="margin-left:400px;"><b style="color:#2b3856;">GSS:</b>"<b style="color:#ff4500;">G</b>estion des 
			<b style="color:#ff4500;">S</b>erveurs <b style="color:#ff4500;">S</b>onatrach" <b>/ / /</b>
			<b style="color:#2b3856;">Copyrights©</b>Damoun Khouloud/Foudili Sirine</p>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>