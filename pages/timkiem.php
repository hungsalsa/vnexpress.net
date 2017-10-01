<?php 
if(isset($_GET['q'])){
    $key_search = $_GET['q'];

?>

<div class="">
    <?php if (!empty($key_search )): ?>
        <h3>Trang chu  >> Tu khoa tim kiem: <?= $key_search ?></h3>
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
    $search = timkiem_Phantrang2($key_search,($trang-1)*$sotin1trang,$sotin1trang);
    if(mysql_num_rows($search)){
        while ($result = mysql_fetch_array($search)) {
    

 ?>
<div class="box-cat">
	<div class="cat1">
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?= $result['idTin'] ?>"><?= $result['TieuDe'] ?></a></h3>
                    <a href="index.php?p=chitiettin&idTin=<?= $result['idTin'] ?>"><img class="images_news" src="upload/tintuc/<?= $result['urlHinh'] ?>" align="left" /></a>
                    <div class="des"><?= $result['TomTat'] ?></div>
                    <div class="clear"></div>
                   
				</div>
            </div>
        </div>
    </div>
</div>

<?php 
    }
}else{
?>
<div class="box-cat">
    <div class="cat1">
        <div class="clear"></div>
        <div class="cat-content">
            <h3>Khong co tin nao</h3>
        </div>
    </div>
</div>
<?php } ?>

<!-- box cat-->
<?php 
    // Dem so tin 1 trang
    $count_tin = timkiem($key_search);
     $tongsotin = mysql_num_rows($count_tin);
// echo $tongsotin;
     // print_r($tongsotin);die;
     $tongsotrang = ceil($tongsotin/$sotin1trang);
 ?>
 <?php if ($tongsotin): ?>
     

 <div class="pagination">
  <a href="#">&laquo;</a> 

 <?php for ($i = 1; $i <= $tongsotrang; $i++) { ?>
    <a href="/index.php?p=timkiem&q=<?= $key_search ?>&trang=<?= $i ?>" <?php if($i==$trang) echo ' class="active"'; ?>><?= $i ?></a>
    <!-- <a href="#">1</a> -->
 <?php  } ?>

  <a href="#">&raquo;</a>
</div>
 <?php endif ?>
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
<?php } ?>