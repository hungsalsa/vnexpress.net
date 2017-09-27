<?php
require ('dbCon.php');


// ham tạo tin mới nhất
 function tinmoinhat($start=0,$limit=1)
{
    $sql = "SELECT * FROM tin ORDER BY idTin DESC LIMIT $start,$limit";
    return mysql_query($sql);
}

 function XemNhieuNhat($start=0,$limit=6)
{
    $sql = "SELECT * FROM tin ORDER BY SoLanXem DESC LIMIT $start,$limit";
    return mysql_query($sql);
}

// ham tạo tin mới nhất theo loai tin
 function tinmoinhat_TheoLoaiTin($idLT,$start=0,$limit=1)
{
    $sql = "SELECT * FROM tin WHERE idLT=$idLT ORDER BY idTin DESC LIMIT $start,$limit";
    return mysql_query($sql);
}

// ham tạo tin mới nhất theo the loai
 function tinmoinhat_TheoTheLoai($idTL,$start=0,$limit=1)
{
    $sql = "SELECT * FROM tin WHERE idTL=$idTL AND AnHien=1 ORDER BY idTin DESC LIMIT $start,$limit";
    return mysql_query($sql);
}

// Lay  thong tin loai tii theo the loai
function get_info_loaitin($idLT)
{
    $sql = "SELECT * FROM loaitin WHERE idLT=$idLT";
    return mysql_query($sql);
}

// lay ramdon loai tin trong bang loai tin
function get_random_loaitin()
{
    $sql = "SELECT idLT FROM loaitin ORDER BY RAND() LIMIT 0,3";
    $result = array();
    $query = mysql_query($sql);
    while($array_LT = mysql_fetch_assoc($query)){
        $result[]= $array_LT['idLT'];
    }
    
    return $result;
}

// ham lay quang cao top ben phai
function get_Advert_right($vitri=1)
{
    $sql = "SELECT * FROM quangcao WHERE vitri=$vitri";
    return mysql_query($sql);
}

// ham lay danh sach the loai
function get_theloai()
{
    $sql = "SELECT * FROM theloai";
    return mysql_query($sql);
}

// Ham lay loai tin voi IdTL cho truoc
function get_loaitin($idTL)
{
    $sql = "SELECT * FROM loaitin WHERE idTL=".$idTL." AND AnHien=1";
    return mysql_query($sql);
}

// Ham lay loai tin voi loai tin cho truoc
function Danhsach_tin($idLT,$start=0,$end=10)
{
    $sql = "SELECT * FROM tin WHERE idLT=".$idLT." AND AnHien=1 ORDER BY idTin DESC LIMIT $start,$end";
    return mysql_query($sql);
}

// Lay thong tin tin theo IDTIN
function get_tin_info($idTin)
{
     $sql = "SELECT * FROM tin WHERE idTin=".$idTin." AND AnHien=1";
    return mysql_query($sql);
}