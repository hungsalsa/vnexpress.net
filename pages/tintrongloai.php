<?php 
if(isset($_GET['idLT'])){
    $idLT = $_GET['idLT'];
    settype($idLT,"int");
    ?>
<div class="">
    <?php 
       
        $theloai_loaitin = get_theloai_loaitin($idLT);
        $TenTL_TenLT = mysql_fetch_array($theloai_loaitin);
    ?>
    <?php if (!empty($TenTL_TenLT )): ?>
        <h3>Trang chu >> <?= $TenTL_TenLT['TenTL'] ?> >> <?= $TenTL_TenLT['Ten'] ?></h3>
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
    $tin = Danhsach_tin_Phantrang($idLT,($trang-1)*$sotin1trang,$sotin1trang);
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
<?php 
    // Dem so tin 1 trang
    $count_tin = Danhsach_tin($idLT);
     $tongsotin = mysql_num_rows($count_tin);
     $tongsotrang = ceil($tongsotin/$sotin1trang);
 ?>
 
 <div class="pagination">
  <a href="#">&laquo;</a> 

 <?php for ($i = 1; $i <= $tongsotrang; $i++) { ?>
    <a href="/index.php?p=tintrongloai&idLT=<?= $idLT ?>&trang=<?= $i ?>" <?php if($i==$trang) echo ' class="active"'; ?>><?= $i ?></a>
    <!-- <a href="#">1</a> -->
 <?php  } ?>

  <a href="#">&raquo;</a>
</div>

<style>
.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    font-size: 18px;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>