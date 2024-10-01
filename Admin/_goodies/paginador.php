<div class="div100">

<?
$max=5;
$ini=$pag-2;
$fin=$pag+2;
if($ini<$max && $fin<$max){$ini=1;}
if($fin<$max){$fin=$max;}
if($fin>$cuantosSelects){$fin=$cuantosSelects;}
if($cuantosSelects>1){
?>
<table class="paginador" >
<tr>
<? if ($ini>1){ ?>
<td class="pagina" style="cursor: pointer;" onClick="top.location.href='?p=<?=$pag-1?>&c=<?=$campo?>&o=<?=$orden?>'"><</td>
<td class="pagina"  style="cursor: pointer;" onClick="top.location.href='?p=1&c=<?=$campo?>&o=<?=$orden?>'"> 1</td>
<td>...</td>
<? } ?>
<? 
for ($i = $ini; $i <= $fin; $i++) { ?>
<td class="pagina" style="cursor: pointer; <? if($pag==$i){ ?>background-color: #999; color:#FFF;<? } ?>" onClick="top.location.href='?p=<?=$i?>&c=<?=$campo?>&o=<?=$orden?>'"><?=$i?></td>
<?
if($i==$cuantosSelects){$mataPuntos=1;}

} ?>
<? if ($mataPuntos==""){ ?>
<td>...</td>
<td class="pagina" style="cursor: pointer;" onClick="top.location.href='?p=<?=$cuantosSelects?>&c=<?=$campo?>&o=<?=$orden?>'"><?=$cuantosSelects?></td>
<td class="pagina" style="cursor: pointer;" onClick="top.locationM=?p=<?=$pag+1?>&c=<?=$campo?>&o=<?=$orden?>'">></td>
<? } ?>
</tr>
</table>
<div class="clear20"></div>
<? } ?>
</div>