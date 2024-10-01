<? include "../sesion/arriba.php"; 

$arregloIdiomas=array();
$arregloIdiomas['es']='Español';
$arregloIdiomas['en']='Inglés';




?>

<table id="tablesorter"  class="tablesorter"  >

<thead>
<tr>

<th>Email</th>
 <? foreach ($arregloIdiomas as $idiomin) { ?>
 <th><?=$idiomin?></th>
 <?
} ?>

</tr>
</thead>

<?

$res6 = $mysqli->query("SELECT * FROM emails WHERE id!='footer' ORDER BY titulo ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
		$valor=$fila['id'];
		$donde= $fila['titulo'];
		$info=unserialize($fila['info']);
		
	

				?>

<tr class="linea" id="linea<?=$valor?>"  >
<td><?=$donde?> </td>

 <? foreach ($arregloIdiomas as $key => $idiomin) {
	 $checado="";
	 if($info[$key]!=""){$checado="check"; $msg="Edit";}	
	 if($info[$key]==""){$checado="check_box_outline_blank"; $msg="Create";}	
	  ?>
<td><a href="<?=$url?>/_emails/emails/emailsAdd.php?u=<?=$valor?>&i=<?=$key?>" title="<?=$msg?>">
 <div class="material-icons"> <?=$checado?></div>
</a></td>
 <? } ?>

<td class="ctrls" id="controles_linea<?=$valor?>" >
<div style="float:left;  ">


    </div>
	
 
 </td>
 </tr>             
 <? } ?>
 
<tr class="linea" id="linea<?=$valor?>"  >
<td>Footer </td>

 <? 
 $cuenta=1;
 foreach ($arregloIdiomas as $key => $idiomin) {
	 
	  ?>
<td><? if ($cuenta==1){ ?><a href="<?=$url?>/_emails/emails/emailsAdd.php?u=footer&i=<?=$key?>" > 
 <div class="material-icons"> check</div>
</a>
<? } ?>
</td>
 <?
 $cuenta=$cuenta+1;
  } ?>

<td class="ctrls" id="controles_linea<?=$valor?>" >
<div style="float:left;  ">


    </div>
	
 
 </td>
 </tr>  



</table>

 
