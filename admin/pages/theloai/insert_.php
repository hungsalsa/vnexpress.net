<?php 
ob_start();
 ?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Thêm mới thể loại</h3>
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
                <input type="text" class="form-control" placeholder="Nhập tên thể loại" name="TenTL">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự hiển thị</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="ThuTu" id="autocomplete-custom-append" class="form-control col-md-10"/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="AnHien">
                  <option value="1"> Hiện </option>
                  <option value="0"> Ản </option>
                </select>
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="button" class="btn btn-primary">Cancel</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-success" name="themTL" value="themTL">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
if(isset($_POST['themTL'])){
  $post =array();
  $array = $_POST;

    echo '<pre>';
    print_r($array);

  insert_TheLoai($array);
  
  if(mysql_error()){
    die(mysql_error());
  } else{
    header("location:index.php?p=listTheLoai");
  }
}
 ?>
