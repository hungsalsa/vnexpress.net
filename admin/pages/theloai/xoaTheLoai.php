<?php

require '../../../lib/admin.php';

if(isset($_GET['idTL'])){

	$idTL = $_GET['idTL'];
	$theloai = get_theloai_id($idTL);

	if(mysql_num_rows($theloai)){
		TheLoai_delete($idTL);
	}
}

header("location:../../index.php?p=listTheLoai");