<?php 
if(isset($_GET['idLT'])){
    $idLT = $_GET['idLT'];
    settype($idLT,"int");

    ?>

    <?php
    $tin = Danhsach_tin($idLT);

    while ($row_tin = mysql_fetch_assoc($tin)) {
    
?>
<div class="box-cat">
	<div class="cat1">
    	
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?= $row_tin['idTin'] ?>"><?= $row_tin['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?= $row_tin['urlHinh'] ?>" align="left" />
                    <div class="des"><?= $row_tin['TomTat'] ?></div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            
        </div>
    </div>
</div>

<?php 
    }
}

?>

<!-- box cat-->
