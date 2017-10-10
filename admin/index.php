<?php 
	ob_start();
	session_start();

	if( !isset($_SESSION['idUser']) || $_SESSION['idGroup'] !=1 ){
		header("location:../index.php");
	}
	require '../lib/admin.php';

	if( isset($_GET["p"]) ){
		$p = $_GET['p'];
	}else{
		$p = "";
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require 'blocks/head.php'; ?>
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<?php require 'blocks/left_col.php'; ?>
			</div>

			<!-- top navigation -->
	        <div class="top_nav">
	        	<?php require 'blocks/top_nav.php'; ?>
	        </div>
	        <!-- /top navigation -->

	         <!-- page content -->
	         <div class="right_col" role="main">

			<?php 
			// echo $p;
			switch ($p) {
				case "listTheLoai":
					require("pages/theloai/danhsach.php");
					break;

				case "themTheLoai":
					require("pages/theloai/insert_.php");
					break;

				case "listLoaiTin":
					require("pages/loaitin/danhsach.php");
					break;

				case "themloaitin":
					require("pages/loaitin/insert_.php");
					break;

				case "sualoaitin":
					require("pages/loaitin/insert_.php");
					break;
					
				case "listTin":
					require("pages/tintuc/danhsach.php");
					break;

				case "themtintuc":
					require("pages/tintuc/insert_.php");
					break;

				case "suatintuc":
					require("pages/tintuc/insert_.php");
					break;



				default:
					require("/pages/content.php");
					break;
			}
			 ?>

	         </div>

	          <!-- footer content -->
	        <footer>
	          <?php require 'blocks/footer.php'; ?>
	        </footer>
	        <!-- /footer content -->


		</div>
	</div>

 <!-- MODAL   -->
<!-- Large modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">File manager</h4>
      </div>
      <div class="modal-body">
        <iframe  width="765" height="550" frameborder="0"
            src="../filemanager/dialog.php?type=1&field_id=imageFile">
        </iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<?php
	require 'blocks/link_js.php'; 
?>
</body>
</html>
