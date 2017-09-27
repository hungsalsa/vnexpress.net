<?php 
$advert = get_Advert_right();
while($row_advert = mysql_fetch_array($advert))
	{
?>

	<a href="<?= $row_advert['Url']; ?>"><img alt="<?= $row_advert['MoTa']; ?>" width="280" src="upload/quangcao/<?= $row_advert['urlHinh']; ?>" /></a>
	<div style="height:10px"></div>
	
<?php } ?>