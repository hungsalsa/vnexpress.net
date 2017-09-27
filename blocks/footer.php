<div class="thongtin-title">
	<div class="right">
    
          <a href="#"><span class="SetHomePage ico_respone_01">&nbsp;</span>Đặt VnExpress làm trang chủ</a>
          
          <a href="#"><span class="top">&nbsp;</span>Về đầu trang</a>
       
    </div>
</div>
<div class="thongtin-content">

  <?php 
  $i=0;
  $theloai = get_theloai();
  while ($row_theloai = mysql_fetch_array($theloai)) {
    $i++;
  ?>
	<ul class="ulBlockMenu">
      <li class="liFirst">
         <h2>
            <a class="mnu_giaoduc" href="#"><?= $row_theloai['TenTL'] ?></a>
         </h2>
      </li>
      <?php 
      $loaitin = get_loaitin($row_theloai['idTL']);
      while ($row_loaitin = mysql_fetch_array($loaitin)) {
      ?>
      <li class="liFollow">
         <h2>
            <a href="index.php?p=tintrongloai&idLT=<?= $row_loaitin['idLT'] ?>"><?= $row_loaitin['Ten'] ?></a>
         </h2>
      </li>
        <?php 
      }
        ?>
   </ul>
   <?php if ($i%6==0): ?>
   <div class="clear"></div>  
   <?php endif ?>
   
  <?php 
  }
  ?>             

</div>




