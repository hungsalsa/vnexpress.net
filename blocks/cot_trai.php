<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#">Tin xem nhiều</a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
        	<?php 
            $TinXemNhieu = XemNhieuNhat();
            while ($tin_Xem_Nhieu = mysql_fetch_array($TinXemNhieu)) {
            
            ?>
            <div class="col1">
            	<div class="news">
                  <a href="index.php?p=chitiettin&idTin=<?= $tin_Xem_Nhieu['idTin'] ?>"><img class="images_news" src="upload/tintuc/<?= $tin_Xem_Nhieu['urlHinh'] ?>"  /></a>
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?= $tin_Xem_Nhieu['idTin'] ?>"><?= $tin_Xem_Nhieu['TieuDe'] ?></a><span class="hit"><?= $tin_Xem_Nhieu['SoLanXem'] ?></span></h3>
                    <div class="clear"></div>
				</div>
            </div>
            <?php 
            }    
             ?>

        </div>
    </div>
</div>
<div class="clear"></div>

