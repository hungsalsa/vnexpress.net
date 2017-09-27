
<link rel="stylesheet" type="text/css" href="ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="ddsmoothmenu-v.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Please keep this notice intact
* Visit Dynamic Drive at #/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
  mainmenuid: "smoothmenu1", //menu DIV id
  orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
  classname: 'ddsmoothmenu', //class added to menu's outer DIV
  //customtheme: ["#1c5a80", "#18374a"],
  contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

ddsmoothmenu.init({
  mainmenuid: "smoothmenu2", //Menu DIV id
  orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
  classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
  method: 'toggle', // set to 'hover' (default) or 'toggle'
  arrowswap: true, // enable rollover effect on menu arrow images?
  //customtheme: ["#804000", "#482400"],
  contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<!-- Markup for mobile menu toggler. Hidden by default, only shown when in mobile menu mode -->
<a class="animateddrawer" id="ddsmoothmenu-mobiletoggle" href="#">
<span></span>
</a>
<!-- 
<ul class="width_common" id="menu_web">
          <li class="active"><a href="./"><img class="logo_icon_home" alt="" src="images/img_logo_home.gif"></a></li>
          
          <li>
              <a href="./" class="mnu_thoisu">Thời sự</a>
          </li>
          <li>
              <a href="./" class="mnu_thoisu">Thời sự</a>
          </li>
          <li>
              <a href="./" class="mnu_thoisu">Thời sự</a>
          </li>
          -->  
</ul>


<div id="smoothmenu1" class="ddsmoothmenu">
<ul>
  <li class="active"><a href="./"><img class="logo_icon_home" alt="" src="images/img_logo_home.gif">Trang chu</a></li>
  <?php 
    $theloai = get_theloai();
    while ($row_theloai = mysql_fetch_array($theloai)) {
  ?>
  <li><a href="index.php?p=tintrongloai&idTL=<?= $row_theloai['idTL'] ?>"><?= $row_theloai['TenTL'] ?></a>
    <?php 
      $loaitin = get_loaitin($row_theloai['idTL']);
     
      if(mysql_num_rows($loaitin)){
    ?>

    <ul>
      <?php 
        while ($row_loaitin = mysql_fetch_array($loaitin)) {
      ?>
      <li><a href="index.php?p=tintrongloai&idLT=<?= $row_loaitin['idLT'] ?>"><?= $row_loaitin['Ten'] ?></a></li>
      <?php 
        }
      ?>
    </ul>

    <?php 
      }
    ?>

  </li>
  <?php 
  }
  ?>
</ul>
<br style="clear: left" />
</div>




