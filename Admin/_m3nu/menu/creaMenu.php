 <? 
ob_start();	

		$selas="SELECT * FROM menu WHERE idMenu='0' AND permisoMenu!='' AND  FIND_IN_SET('$perfilazo',permisoMenu)    ORDER BY orden ASC ";
		$res6 = $mysqli->query($selas);
		$res6->data_seek(0);
		 while ($fila = $res6->fetch_assoc()) 
			{
			$idMenu= $fila['id'];
			$tituloMenu= $fila['titulo'];
			$dondeMenu= $fila['donde'];
			$iconoMenu= $fila['icono'];
			$permiso= $fila['permisoMenu'];
		

			if($donde==$dondeMenu){
			
       }?>
         <div class="divMenuT"  ></div>
        
        <div class="menu<?=$dondeMenuP?>" id="<?=$dondeMenu?>">
            <div class="menuInterfaseIcono padd3"><?=$iconoMenu?></div>
            <div class="menuInterfaseTexto padd3"><?=$tituloMenu?></div>
            <div class="menuInterfaseIcono flecha padd3">keyboard_arrow_left</div>
        </div>
        
  
        
        <div style="clear:both;"></div>
        <div class="subMenu" id="menu_<?=$dondeMenu?>" style=" <?=$dondeMenuD?>">
        <div class="divMenu"  ></div>
     
        <? $res6s = $mysqli->query("SELECT * FROM menu WHERE idMenu='$idMenu' AND permisoMenu!='' AND  FIND_IN_SET('$perfilazo',permisoMenu)    ORDER BY orden ASC ");
		$res6s->data_seek(0);
		 while ($filas = $res6s->fetch_assoc()) 
		{
			$tituloMenuS= $filas['titulo'];
			$rutaMenuS= $filas['ruta'];
			$permisoS= $filas['permisoMenu'];
			 
			?>
         <a class="menuRuta" href="<?=$url?>/<?=$rutaMenuS?>"><div class="menuS"><?=$tituloMenuS?></div></a>
  <div class="divMenu"  ></div>
        <? 
		}?>
        
        </div>
            
      <? 
		}
	   ?>
 

        


<?
file_put_contents($ruta.'/interfase/menu_'.$perfilazo.'.html', ob_get_contents());
// end buffering and displaying page
ob_end_flush();

?>
