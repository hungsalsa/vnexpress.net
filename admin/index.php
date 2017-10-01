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
			switch ($p) {
				case "listTheLoai":
					require("pages/theloai/listTheLoai.php");
					break;

				case "listLoaiTin":
					require("pages/loaitin/listLoaiTin.php");
					break;
				case "listTin":
					require("pages/tin/listTin.php");
					break;
				// case "listQuangCao":
				// 	require("/pages/listQuangCao.php");
				// 	break;

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
	
	<?php

	require 'blocks/link_js.php'; 
	 
	// switch ($p) {
	// 	case "listTheLoai":
	// 		require("pages/theloai/link_js.php");
	// 		break;

	// 	// case "listLoaiTin":
	// 	// 	require("/pages/listLoaiTin.php");
	// 	// 	break;
	// 	case "listTin":
	// 		require("pages/theloai/link_js.php");
	// 		break;
	// 	// case "listQuangCao":
	// 	// 	require("/pages/listQuangCao.php");
	// 	// 	break;

	// 	default:
	// 		require 'blocks/link_js.php'; 
	// 		break;
	// }
	 ?>

	
</body>
</html>
