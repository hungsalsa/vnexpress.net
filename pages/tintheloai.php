<?php 
if(isset($_GET['idTL'])){
    $idTL = $_GET['idTL'];
    settype($idTL,"int");
    ?>
<div class="">
    <?php 
        $theloai_loaitin = get_theloai_loaitin($idTL);
        $TenTL_TenLT = mysql_fetch_array($theloai_loaitin);
    ?>
    <?php if (!empty($TenTL_TenLT )): ?>
        <h3>Trang chu >> <?= $TenTL_TenLT['TenTL'] ?></h3>
    <?php endif ?>
    
</div>
    <?php
    $sotin1trang =5;
    if(isset($_GET['trang'])){
        $trang = $_GET['trang'];
        settype($trang,"int");
    }else{
        $trang =1;
    }
    $tin = Danhsach_tin_theloai_Phantrang($idTL,($trang-1)*$sotin1trang,$sotin1trang);
    while ($row_tin = mysql_fetch_assoc($tin)) {
    
?>
<div class="box-cat">
	<div class="cat1">
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?= $row_tin['idTin'] ?>"><?= $row_tin['TieuDe'] ?></a></h3>
                    <a href="index.php?p=chitiettin&idTin=<?= $row_tin['idTin'] ?>"><img class="images_news" src="upload/tintuc/<?= $row_tin['urlHinh'] ?>" align="left" /></a>
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
