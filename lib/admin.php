<?php
require ('../lib/dbCon.php');

// Ham lay danh sach the loai
function get_theloai()
{
    $sql = "SELECT * FROM theloai WHERE AnHien=1";
    return mysql_query($sql);
}

function get_tin()
{
    $sql = "SELECT * FROM tin WHERE AnHien=1 LIMIT 0,30";
    return mysql_query($sql);
}

// Hàm lấy danh sách loại tin
function get_listLoaiTin()
{
    $sql =  "SELECT * FROM loaitin WHERE AnHien=1";
    return mysql_query($sql);
   
}

// Ham lay loai tin theo idLT
function get_LoaiTin($idLT)
{
    $sql = "SELECT * FROM loaitin WHERE idLT ='$idLT' AND AnHien=1";
    $query = mysql_query($sql);
    if(mysql_num_rows($query)){
        return mysql_fetch_assoc($query);
    }else{
        return null;
    }
    
}

// Ham lay user theo idUser
function get_User($idUser)
{
    $sql = "SELECT * FROM users WHERE idUser ='$idUser' AND `Active`=1";
    $query = mysql_query($sql);
    if(mysql_num_rows($query)){
        return mysql_fetch_assoc($query);
    }else{
        return null;
    }
    
}

function sanitizeTitle($string) {
    if(!$string) return false;
    $utf8 = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            );
    foreach($utf8 as $ascii=>$uni) $string = preg_replace("/($uni)/i",$ascii,$string);
    $string = utf8Url($string);
    return $string;
}
 
function utf8Url($string){        
    $string = strtolower($string);
    $string = str_replace( "ß", "ss", $string);
    $string = str_replace( "%", "", $string);
    $string = preg_replace("/[^_a-zA-Z0-9 -]/", "",$string);
    $string = str_replace(array('%20', ' '), '-', $string);
    $string = str_replace("----","-",$string);
    $string = str_replace("---","-",$string);
    $string = str_replace("--","-",$string);
    return $string;
}    
 
// Use
 
$title = 'Chuyển tiếng viết có dấu sang không dấu trong PHP';
$url = sanitizeTitle($title);
