<?php 
ob_start();

if(isset($_GET['idLT'])){
  $idLT = $_GET['idLT'];
  settype($idLT,"int");
  $loaitin = get_LoaiTin($idLT);

  if(mysql_num_rows($loaitin)){
    $loaitin = mysql_fetch_assoc($loaitin);

    // Sửa loại tin
    if(isset($_POST['suaLT'])){
      $post =array();
      $Edit_LT = $_POST;

    // edit_loaitin
      edit_LoaiTin($idLT,$Edit_LT);
      
      if(mysql_error()){
        die(mysql_error());
      } else{
        $_SESSION['message'] = "Bạn sửa thành công ".$Edit_LT['Ten'];
        header("location:index.php?p=listLoaiTin");
      }
    }
  }
}

  // khi click thêm loại tin
  if(isset($_POST['themLT'])){
    $loaitin =array();
    $loaitin = $_POST;
    // Kiem tra loại tin đã có chưa
    if(get_LoaiTin_Ten($loaitin['Ten'])){
      $message = "Loại tin ".$loaitin['Ten']." đã có !";
    }else{
      if($link = insert_LoaiTin($loaitin)){
        $_SESSION['message'] = "Bạn thêm thành công ".$loaitin['Ten'];
        header("location:index.php?p=listLoaiTin");
      }else{
        echo 'ERRORRRR'.mysql_error($link);die();
      }
    }
    
  }

 ?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><?= (isset($_GET['idLT']))? 'Sửa thể loại':'Thêm mới thể loại' ?></h3>
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
          <h2><?= (isset($message))? $message:'Nhập đầy đủ thông tin ' ?></small></h2>
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
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên loại tin</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input required="required" type="text" class="form-control" placeholder="Nhập tên loại tin" name="Ten" value="<?= (isset($_GET['idLT']))? $loaitin['Ten']:'' ?>">
              </div>
            </div>

            <?php 
            $theloai =get_theloai_Active();
            ?>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Thuộc thể loại</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="idTL">
                    <option > -- Chọn thể loại -- </option>
                  <?php while ($result = mysql_fetch_assoc($theloai)): ?>
                    <option value="<?= $result['idTL'] ?>" <?= (isset($_GET['idLT']) && $result['idTL'] == $loaitin['idTL'])?'selected="select"':'' ?> > <?= $result['TenTL'] ?> </option>
                  <?php endwhile ?>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự hiển thị</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="number" name="ThuTu" id="autocomplete-custom-append" class="form-control col-md-10" value="<?= (isset($_GET['idLT']) || $loaitin)? $loaitin['ThuTu']:'' ?>"/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="AnHien">
                  <option value="1" <?= (isset($_GET['idLT']) && $loaitin['AnHien']==1 )? 'selected="select"' :'' ?>> Hiện </option>
                  <option value="0" <?= (isset($_GET['idLT']) && $loaitin['AnHien']==0)? 'selected="select"' :'' ?>> Ẩn </option>
                </select>
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-primary" name="Cancel">Cancel</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-success" name="<?= (isset($_GET['idLT']))? 'suaLT':'themLT' ?>"><?= (isset($_GET['idLT']))? 'Sửa loại tin':'Thêm loại tin' ?></button>
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
  header("location:index.php?p=listloaitin");
}




 ?>
