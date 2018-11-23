<?php



echo "bonsoir";
var_dump ($_POST);

?>
<!doctype html>
<html lang="fr">
<head>

  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, 
		  maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-compatible" content="ie=edge">
  <title> documents </title>
  </head>
  <body>
  <h1> afficharge des données issus du formulaire </h1>
  <ul>
     <li> <?php echo $_POST['activity_sector']; ?></li>
	 <li> <?php echo $_POST['nombre_employés']; ?></li>
	 <li> <?php echo $_POST['turnover_last_fiscal_year']; ?></li>
	 <li> <?php echo $_POST['51']; ?></li>
	 <li> <?php echo $_POST['52']; ?></li>
  </ul>
	  <p> <a href="51.75.249.195"> exporter
	  <!--?php
	 header('Content-Type: text/csv;');
     header('Content-Disposition: attachment; filename="Export tuto.csv"');
	 ?-->
	 </a> </p>
</body>
</html>
<?php
function random($var){
        $string = "";
        $chaine = "a0b1c2d3e4f5g6h7i8j9klmnpqrstuvwxy123456789";
        srand((double)microtime()*1000000);
        for($i=0; $i<$var; $i++){
            $string .= $chaine[rand()%strlen($chaine)];
        }
        return $string;
    }
 
  $_SESSION['token'] = random(25); // clé aléatoire de 25 caractères créée a partir de la fonction
?> 
<?php
if(!empty($_GET['token']) && $_GET['token'] == $_SESSION['token']){
  //requete...
}
?>