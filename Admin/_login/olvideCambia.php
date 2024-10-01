<? include "../sesion/arriba.php"; ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300,100' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<? include"../control/css.php" ?>
<? include "../control/magia.php" ;?>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=2.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<title><?=$titulo?></title>


<body style="  height:100%; background-color:#FFF;">

<div id="sub">

<div style=" width:350px;  position:absolute; top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);text-align:center;">
<img src="<?=$urlFront?>/img/logo.svg" height="40" />

<div style="clear:both; height:20px;"></div>

<?
$mete=$_SESSION['mientras'];

if($mete>10){die();}

 extract($_GET);
 $codigo=mataMalos($c);	
 $usuaron=mataMalos($u);	

  if($codigo!=""){
 $res6 = $mysqli->query("SELECT * FROM usuarios WHERE id='$usuaron' AND   clave='$codigo' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
 	$puedoCambiarContra= $fila['id'];
	$nombre= $fila['nombre'];
	}
  }
?>



<? 

 if ($puedoCambiarContra!="") { ?>


 <div id="formas"><? include "olvideCambiaForma.php"; ?></div>
<?
}
if (  $puedoCambiarContra=="") {
	
	 $mete++;
 $_SESSION['mientras']=$mete;	?>
 
 <script>top.location.href = "<?=$url?>";</script>	
 <?	
		}

 ?>
</div>
</div>
 
    
    
	
	       
        </body>
</html>