<?php 
ob_start();

if(isset($_GET['idTL'])){
  $idTL = $_GET['idTL'];
  settype($idTL,"int");
  $theloai = get_theloai_id($idTL);
  if(mysql_num_rows($theloai)){
    $info_TL = mysql_fetch_assoc($theloai);
  }else{
    header("location:index.php?p=listTheLoai");
  }
}


 ?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><?= (isset($_GET['idTL']))? 'Sửa thể loại':'Thêm mới thể loại' ?></h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Nhập đầy đủ thông tin <small>different form elements</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form class="form-horizontal form-label-left" method="post" action="">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên thể loại</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input required="required" type="text" class="form-control" placeholder="Nhập tên thể loại" name="TenTL" value="<?= (isset($_GET['idTL']))? $info_TL['TenTL']:'' ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự hiển thị</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="number" name="ThuTu" id="autocomplete-custom-append" class="form-control col-md-10" value="<?= (isset($_GET['idTL']))? $info_TL['ThuTu']:'' ?>"/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="AnHien">
                  <option value="1" <?= (isset($_GET['idTL']) && $info_TL['AnHien']==1)? 'selected="select"' :'' ?>> Hiện </option>
                  <option value="0" <?= (isset($_GET['idTL']) && $info_TL['AnHien']==0)? 'selected="select"' :'' ?>> Ẩn </option>
                </select>
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-primary" name="Cancel">Cancel</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-success" name="<?= (isset($_GET['idTL']))? 'suaTL':'themTL' ?>"><?= (isset($_GET['idTL']))? 'Sửa thể loại':'Thêm thể loại' ?></button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php 
if(isset($_POST['Cancel'])){
  header("location:index.php?p=listTheLoai");
}

if(isset($_POST['themTL'])){
  $post =array();
  $array = $_POST;

  insert_TheLoai($array);
  
  if(mysql_error()){
    die(mysql_error());
  } else{
    header("location:index.php?p=listTheLoai");
  }
}

if(isset($_POST['suaTL'])){
  $post =array();
  $theloai = $_POST;
// edit_TheLoai
  edit_TheLoai($idTL,$theloai);
  
  if(mysql_error()){
    die(mysql_error());
  } else{
    $_SESSION['message'] = "Bạn sửa thành công ".$theloai['TenTL'];
    header("location:index.php?p=listTheLoai");
  }
}
 ?>
