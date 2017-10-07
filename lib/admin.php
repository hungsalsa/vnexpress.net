<?php
$link = mysql_connect("localhost","root","");
mysql_select_db("vnexpress.net");
mysql_query("SET NAMES 'utf8'");

// Ham lay danh sach the loai
function get_theloai()
{
    $sql = "SELECT * FROM theloai ORDER BY idTL DESC";
    return mysql_query($sql);
}

// Ham lay danh sach the loai active
function get_theloai_Active()
{
    $sql = "SELECT * FROM theloai WHERE AnHien=1 ORDER BY idTL DESC";
    return mysql_query($sql);
}

// Ham lay danh sach the loai theo idTL
function get_theloai_id($idTL)
{
    $sql = "SELECT * FROM theloai WHERE idTL='$idTL' ORDER BY idTL DESC";
    return mysql_query($sql);
}

// Ham Xoa the loai theo idTL
function TheLoai_delete($idTL)
{
    $sql = "DELETE FROM theloai WHERE idTL='$idTL'";
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
    $sql =  "SELECT * FROM loaitin";
    return mysql_query($sql);
}

// Ham lay loai tin theo idLT
function get_LoaiTin($idLT)
{
    $sql = "SELECT * FROM loaitin WHERE idLT ='$idLT'";
    $query = mysql_query($sql);
    if(mysql_num_rows($query)){
        return mysql_fetch_assoc($query);
    }else{
        return null;
    }
}

// Ham lay loai tin theo Tên
function get_LoaiTin_Ten($Ten)
{
    $sql = "SELECT * FROM loaitin WHERE Ten ='$Ten'";
    $query = mysql_query($sql);
    return mysql_num_rows($query);
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

// them moi the loai
function insert_TheLoai($array = array())
{

    if(!empty($array)){
        // Attempt insert query execution
        $sql = "INSERT INTO theloai (idTL,TenTL, TenTL_KhongDau, ThuTu, AnHien) VALUES (null,'".$array['TenTL']."', '".sanitizeTitle($array['TenTL'])."', '".$array['ThuTu']."','".$array['AnHien']."')";
        if($link = mysql_query($sql)){
            return "Records inserted successfully.";
        } else{
            return "ERROR: Could not able to execute $sql. " ;
        }
    }
}

function edit_TheLoai($idTL,$theloai = array())
{
    $query="UPDATE theloai
            SET TenTL = '".$theloai['TenTL']."', TenTL_KhongDau = '".sanitizeTitle($theloai['TenTL'])."', ThuTu = '".$theloai['ThuTu']."', AnHien = '".$theloai['AnHien']."' 
            WHERE idTL='$idTL'";

    return mysql_query($query)or die(mysql_error());
}

// them moi loai tin
function insert_LoaiTin($loaitin)
{

    if(!empty($loaitin)){
    $sql = "INSERT INTO loaitin (Ten, Ten_KhongDau, ThuTu, AnHien,idTL) VALUES ('".$loaitin['Ten']."', '".sanitizeTitle($loaitin['Ten'])."', '".$loaitin['ThuTu']."','".$loaitin['AnHien']."','".$loaitin['idTL']."')";

     return mysql_query($sql);
        
    }
}