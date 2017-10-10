<?php 
ob_start();

// if(isset($_GET['idTin'])){
//   $idTin = $_GET['idTin'];
//   settype($idTin,"int");
//   $loaitin = get_LoaiTin($idTin);

//   if(mysql_num_rows($loaitin)){
//     $loaitin = mysql_fetch_assoc($loaitin);

//     // Sửa loại tin
//     if(isset($_POST['suaLT'])){
//       $post =array();
//       $Edit_LT = $_POST;

//     // edit_loaitin
//       edit_LoaiTin($idTin,$Edit_LT);
      
//       if(mysql_error()){
//         die(mysql_error());
//       } else{
//         $_SESSION['message'] = "Bạn sửa thành công ".$Edit_LT['Ten'];
//         header("location:index.php?p=listTin");
//       }
//     }
//   }
// }

  // // khi click thêm tin tức
  // if(isset($_POST['themTin'])){
  //   $tin =array();
  //   $tin = $_POST;
  //   echo '<pre>';print_r($tin);die;
  //   // Kiem tra loại tin đã có chưa
  //   if(get_LoaiTin_Ten($loaitin['Ten'])){
  //     $message = "Loại tin ".$loaitin['Ten']." đã có !";
  //   }else{
  //     if($link = insert_LoaiTin($loaitin)){
  //       $_SESSION['message'] = "Bạn thêm thành công ".$loaitin['Ten'];
  //       header("location:index.php?p=listLoaiTin");
  //     }else{
  //       echo 'ERRORRRR'.mysql_error($link);die();
  //     }
  //   }
    
  // }

 ?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><?= (isset($_GET['idTin']))? 'Sửa tin tức':'Thêm mới tin tức' ?></h3>
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
          <form class="form-horizontal form-label-left" method="get">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiêu đề tin tức</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input required="required" type="text" class="form-control" placeholder="Nhập tiêu đề tin tức" name="TieuDe" value="<?= (isset($_GET['idTin']))? $loaitin['Ten']:'' ?>">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Tóm tắt <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea id="textarea" name="TomTat" class="form-control col-md-7 col-xs-12"></textarea>
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Nội dung <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea id="textarea"  name="Content" class="form-control col-md-7 col-xs-12" rows="8"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input id="imageFile" type="text" class="form-control" placeholder="Mô tả loại tin" name="urlHinh" value="<?= (isset($_GET['idTin']))? $loaitin['Ten']:'' ?>">
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <img src="" id="previewImage" style="margin-left: 300px;">
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
                    <option value="<?= $result['idTL'] ?>" <?= (isset($_GET['idTin']) && $result['idTL'] == $loaitin['idTL'])?'selected="select"':'' ?> > <?= $result['TenTL'] ?> </option>
                  <?php endwhile ?>
                </select>
              </div>
            </div>

          <?php $list_loaitin = get_listLoaiTin_Active(); ?>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Thuộc loại tin</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="idLT">
                    <option > -- Chọn loại tin -- </option>
                  <?php while ($result = mysql_fetch_assoc($list_loaitin)): ?>
                    <option value="<?= $result['idTL'] ?>" <?= (isset($_GET['idTin']) && $result['idTL'] == $loaitin['idTL'])?'selected="select"':'' ?> > <?= $result['Ten'] ?> </option>
                  <?php endwhile ?>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự hiển thị</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="number" name="ThuTu" id="autocomplete-custom-append" class="form-control col-md-10" value="<?= (isset($_GET['idTin']) || $loaitin)? $loaitin['ThuTu']:'' ?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tin nổi bật</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="TinNoiBat">
                  <option value="1" <?= (isset($_GET['idTin']) && $loaitin['TinNoiBat']==1 )? 'selected="select"' :'' ?>> Nổi bật </option>
                  <option value="0" <?= (isset($_GET['idTin']) && $loaitin['TinNoiBat']==0)? 'selected="select"' :'' ?>> Không </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="AnHien">
                  <option value="1" <?= (isset($_GET['idTin']) && $loaitin['AnHien']==1 )? 'selected="select"' :'' ?>> Hiện </option>
                  <option value="0" <?= (isset($_GET['idTin']) && $loaitin['AnHien']==0)? 'selected="select"' :'' ?>> Ẩn </option>
                </select>
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <!-- <button type="submit" class="btn btn-primary" name="Cancel">Cancel</button> -->
                <button type="reset" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-success" name="<?= (isset($_GET['idTin']))? 'suaTin':'themTin' ?>"><?= (isset($_GET['idTin']))? 'Cập nhật':'Thêm mới' ?></button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

 



<?php 
// if(isset($_POST['Cancel'])){
//   header("location:index.php?p=listTin");
// }
 ?>
