<?php 
	session_start();
	require "lib/trangchu.php";
	if( isset($_GET["p"]) ){
		$p = $_GET['p'];
	}else{
		$p = "";
	}

?>
<?php 
	// kiem  tra login
	if(isset($_POST['btnLogin'])) {
		$user = $_POST;
		$user = get_user($user);
		if(mysql_num_rows($user)){
			$user_info = mysql_fetch_assoc($user);
			// print_r($user_info);
			$_SESSION['idUser'] = $user_info['idUser'];
			$_SESSION['HoTen'] = $user_info['HoTen'];
			$_SESSION['idGroup'] = $user_info['idGroup'];
		}
		// $user = get_user($user_infor);
		// $result = mysql_fetch_assoc($user);
		// print_r($result);
	}
	if(isset($_POST['logOut'])){
		unset($_SESSION['idUser']);
		unset($_SESSION['HoTen']);
		unset($_SESSION['idGroup']);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lap Trinh PHP - KhoaPhamTraining</title>
<link rel="stylesheet" type="text/css" href="css/layout.css" />
</head>

<body>
<div id="wrap-vp">
	<div id="header-vp">
    	<div id="logo"><a href="http://local.vnexpress.net/"><img src="images/logo.gif" /></a></div>
    </div>
    
    <div>
    	<!--block/menu.php-->
    	<?php require("blocks/menu.php") ?>
    </div>
      <div id="midheader-vp">
    	<div id="left">
        	<ul class="list_arrow_breakumb">
            	<li class="start">
                <a href="javascript:;">Trang nhất</a>
                <span class="arrow_breakumb">&nbsp;</span></li>
           </ul>
        </div>
        <div id="right">
			<!--blocks/thongtinchung.php-->
			<?php require("blocks/thongtinchung.php") ?>
        </div>
    </div>
    <div class="clear"></div>

    <div id="slide-vp">
    	<!--blocks/top_trang_chu.php-->
    	<?php require("blocks/top_trang_chu.php") ?>

        <div id="slide-right">
	        <!--blocks/quangcao_top_phai.php-->
	        <?php require("blocks/quangcao_top_phai.php") ?>
        </div>
    </div>

  	<div id="content-vp">
    	<div id="content-left">
			<!--blocks/cot_trai.php-->
			<?php require("blocks/cot_trai.php") ?>
        </div>
        <div id="content-main">
			
			<!--PAGES-->
			<?php 
			switch ($p) {
				case "tintrongloai":
					require("pages/tintrongloai.php");
					break;
					case "tintheloai":
					require("pages/tintheloai.php");
					break;
				case "chitiettin":
					require("pages/chitiettin.php");
					break;
				case "timkiem":
					require("pages/timkiem.php");
					break;

				default:
					require("pages/trangchu.php");
					break;
			}
			 ?>
            
        </div>
        <div id="content-right">
        	<div class="user">
        		<?php if (!isset($_SESSION['idUser'])): ?>
			        <?php require("blocks/formlogin.php") ?>
				<?php else: ?>
					<?php require("blocks/formHello.php") ?>
				<?php endif ?>
        	</div>
			<!--blocks/cot_phai.php-->
			
			<?php require("blocks/cot_phai.php") ?>
        </div>

    <div class="clear"></div>
    	
    </div>
    
     <div id="thongtin">
    	<!--blocks/thongtindoanhnghiep.php-->
    	<?php require("blocks/thongtindoanhnghiep.php") ?>
    </div>
    <div class="clear"></div>
    <div id="footer">
    	<!--blocks/footer.php-->
    	<?php require("blocks/footer.php") ?>
        
        <div class="ft-bot">
            <div class="bot1"><img src="images/logo.gif" /></div>
            <div class="bot2">
                     <p>© <span>Copyright 1997 VnExpress.net,</span>  All rights reserved</p>
                     <p>® VnExpress giữ bản quyền nội dung trên website này.</p>
            </div>
            <div class="bot3">
                
                     <p><a href="http://fptad.net/qc/V/vnexpress/2014/07/">VnExpress tuyển dụng</a>   <a href="http://polyad.net/Polyad/Lien-he.htm">Liên hệ quảng cáo</a> / <a href="/contactus">Liên hệ Tòa soạn</a></p>
                     <p><a href="http://vnexpress.net/contact.htm" target="_blank" style="color: #686E7A;font: 11px arial;padding: 0 4px;text-decoration: none;">Thông tin Tòa soạn: </a><span>0123.888.0123</span> (HN) - <span>0129.233.3555</span> (TP HCM)</p>
                  
            </div>
        </div>
    </div>
    
    
    
    
</div>

</body>
</html>
