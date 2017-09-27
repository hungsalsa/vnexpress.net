<?php 
$array_idLT = get_random_loaitin();

// print_r($array_idLT);
// die();
foreach ($array_idLT as $value) {

$loaitin = get_info_loaitin($value); 
$query = mysql_fetch_array($loaitin);
if(empty($query)){
?>
    <div class="main-cat">
        <a href="#">Khong co loai tin nay</a>
    </div>
<?php
}else{
    //echo '<pre>';print_r($query);
?>
<!-- box cat -->
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#"><?= $query['Ten'] ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
            <?php 
            $tinmoi_LT_1 = tinmoinhat_TheoLoaiTin($value);
            if(mysql_num_rows($tinmoi_LT_1)){
                $TinMoiNhat_LT = mysql_fetch_array($tinmoi_LT_1);
            
            ?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?= $TinMoiNhat_LT["idTin"] ?>"> <?= $TinMoiNhat_LT["TieuDe"] ?> </a></h3>
                  <a href="index.php?p=chitiettin&idTin=<?= $TinMoiNhat_LT["idTin"] ?>"><img class="images_news" src="upload/tintuc/<?= $TinMoiNhat_LT["urlHinh"] ?>" align="left" /></a>
                    <div class="des"><?= $TinMoiNhat_LT["TomTat"] ?> </div>
                  <div class="clear"></div>
                   
				</div>
            </div>
            <?php } ?>

            <div class="col2">
                <?php 
            $tinmoi_LT_6 = tinmoinhat_TheoLoaiTin($value,1,6);

            if(mysql_num_rows($tinmoi_LT_6)){
                while($TinMoiNhat_LT_6 = mysql_fetch_array($tinmoi_LT_6)){
            ?>
           <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?= $TinMoiNhat_LT_6["idTin"] ?>"> <?= $TinMoiNhat_LT_6["TieuDe"] ?> </a></h3>
           <?php }} ?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->

<?php } }
?>