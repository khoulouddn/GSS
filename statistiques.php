<?php 

$connect= mysqli_connect("localhost", "root", "", "gss"); 
 $query = "SELECT typeserveur, count(*) as nbr FROM serveur WHERE typeserveur='Application' OR typeserveur='Partage'
  GROUP BY typeserveur "  ;
 $result = mysqli_query($connect, $query);
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
     <link rel="stylesheet" href="http://fonts.googleapis.ccss?family=Roboto:400,400italic,300italic,300,500,500italic,700,900">  <link rel="stylesheet" href="css/bootstrap.css">
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
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         <style type="text/css">
               a.btn-left, .top-header .social-top ul li a, .main-header .menu-wrapper a.toggle-menu {
                                    border: 2px solid #5E7D7E;
                                    border-radius: 40%;}
        </style>
        
        <script type="text/javascript">  

           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {     

                var data = google.visualization.arrayToDataTable([  
                          ['typeserveur', 'nbr'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  

                               echo "['".$row['typeserveur']."', ".$row['nbr']."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>    

           
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
          echo '<li style="margin-right:3px;"><a href="interfaceadmin.php" class="fa fa-home" title="Accueille" ></a></li>';
          echo '<li><a href="liste-compte.php" class="fa fa-users" title="Comptes" ></a></li>';

            }
      if (strcmp( $_SESSION['type'], "User") == 0) {
          echo '<li><a href="interfaceuser.php" class="fa fa-home" title="Accueille" ></a></li>';
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

     
<br /><br />  
           <div style="width:900px; " > 
           <div style="text-align: center; color: #2b3856;"> 
            <b style="font-size:40px;">les statistiques des serveurs</b></div>
 
                <br />  
                <div id="piechart" style="width:1350px; height: 310px;"></div>  
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