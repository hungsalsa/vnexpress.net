<?php 
    $theloai = get_theloai();
    while ($row_theloai = mysql_fetch_array($theloai)) {
    
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="index.php?p=tintrongloai&idTL=<?= $row_theloai['idTL'] ?>"><?= $row_theloai['TenTL'] ?></a>
        </div>
        <?php 
        $loaitin = get_loaitin($row_theloai['idTL']);
        if(mysql_num_rows($loaitin)){
        ?>

        <div class="child-cat">
            <?php 
            while ($row_loaitin = mysql_fetch_array($loaitin)) {
            ?>

        	<a href="index.php?p=tintrongloai&idLT=<?= $row_loaitin['idLT'] ?>"><?= $row_loaitin['Ten'] ?></a>

            <?php 
            }
            ?>
        </div>

        <?php 
        }
        ?>

        <div class="clear"></div>
        <div class="cat-content">
            <?php 
            
                $tinmoinhat_TL =tinmoinhat_TheoTheLoai($row_theloai['idTL']);
                $tinmoinhat_TL = mysql_fetch_assoc($tinmoinhat_TL);
            ?>
            <div class="col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?= $tinmoinhat_TL['idTin'] ?>"><?= $tinmoinhat_TL['TieuDe'] ?> </a></h3>
                    <img class="images_news" src="upload/tintuc/<?= $tinmoinhat_TL['urlHinh'] ?>" align="left" />
                    <div class="des"><?= $tinmoinhat_TL['TomTat'] ?></div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            <?php 
                $tinmoinhat_TL_2 =tinmoinhat_TheoTheLoai($row_theloai['idTL'],1,2);
            ?>
            <div class="col2">
                <?php 
                while ($row_tinmoinhat_TL_2_tin = mysql_fetch_array($tinmoinhat_TL_2)) {
                ?>
                <p class="tlq"><a href="index.php?p=chitiettin&idTin=<?= $row_tinmoinhat_TL_2_tin['idTin'] ?>"> <?= $row_tinmoinhat_TL_2_tin['TieuDe'] ?> </a>
                </p>
                <?php 
                }
                ?>              
            </div>  


        </div>
    </div>
</div>
<div class="clear"></div>


<!-- box cat-->

<?php 
}
?>