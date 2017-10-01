<?php 
$tin = get_tin();
?>
<?php if (mysql_num_rows($tin)): ?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Users <small>Some examples to get you started</small></h3>
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

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách tin <small>Users</small></h2>
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
          <p class="text-muted font-13 m-b-30">
                     Danh sách tin
          </p>


        
          <table id="datatable-fixed-header" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>ID tin</th>
                <th>Tiêu đề</th>
                <th>Hình ảnh</th>
                <th>User đăng</th>
                <th>Loại tin</th>
                <th>Action</th>
              </tr>
            </thead>


            <tbody>

              <?php while($result = mysql_fetch_array($tin)): ob_start();?>
                  <?php 
                    $loaitin = get_LoaiTin($result['idLT']);
                     $result['idLT'] = $loaitin['Ten'];

                     $user = get_User($result['idUser']);
                     $result['idUser'] = $user['HoTen'];
                  ?>
              <tr>
                <td>{idTin}</td>
                <td>{TieuDe}</td>
                <td><img src="../upload/tintuc/{urlHinh}" height="45px"></td>
                <td>{idUser}</td>
                <td>{idLT}</td>
                <td><a href="suaTin.php?idTin={idTin}">Sua</a> - <a href="xoaTin.php?idTin={idTin}">Xoa</a></td>
              </tr>
                <?php 
                $s = ob_get_clean();
                $s = str_replace("{idTin}", $result['idTin'], $s);
                $s = str_replace("{TieuDe}", $result['TieuDe'], $s);
                $s = str_replace("{urlHinh}", $result['urlHinh'], $s);
                $s = str_replace("{idUser}", $result['idUser'], $s);
                $s = str_replace("{idLT}", $result['idLT'], $s);
                echo $s;
                ?>
              <?php endwhile ?>

            </tbody>
          </table>

        

        </div>
      </div>
    </div>
  </div>
</div>

<?php endif ?>