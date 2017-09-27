<?php 
// require "../lib/trangchu.php";

// khoi tao lop tin
$tin = tinmoinhat();

if (mysql_num_rows($tin)) {
    $new_1 = mysql_fetch_array($tin);
} else {
    die("Khong co tin nao moi nhat");
}

 ?>
<div id="slide-left">
        	<div id="slideleft-main">
                <a href="index.php?p=chitiettin&idTin=<?= $new_1['idTin'] ?>"><img src="upload/tintuc/<?= $new_1['urlHinh'] ?>"  /></a><br />
                <h2 class="title"><a href="index.php?p=chitiettin&idTin=<?= $new_1['idTin'] ?>"><?= $new_1['TieuDe'] ?></a> </h2>
                <div class="des">
                    <?= $new_1['TomTat'] ?>
                </div>
                
        	</div>
            <div id="slideleft-scroll">
            	
              <div class="content_scoller width_common">
            <ul>
                <?php 
                $tin_4 = tinmoinhat(1, 6);
                
                while ($new_6 = mysql_fetch_array($tin_4)) {
                ?>

               <li>
                <div class="title_news">
               		<a href="index.php?p=chitiettin&idTin=<?= $new_6['idTin'] ?>" class="txt_link"> <?= $new_6['TieuDe'] ?> </a> 
                </div>
              </li>

                <?php } ?>
            </ul>
            </div>			
            
			<div id="gocnhin">
                <img alt="" src="../images/web-design.jpeg" width="100%"></a>
                <div class="title_news"></div>
            </div>
                
            </div>
</div>


     