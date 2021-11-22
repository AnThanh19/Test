<?php
require_once ('../../db/dbhelper.php');
$matv = $tentv = '';
if (isset($_GET['matv'])) {
	$matv   = $_GET['matv'];
	$sql          = "select * from thanhvien where matv='$matv'";
	$result = executeSingleResult($sql);
	
	if ($result != null) {
		$tentv = $result[1];
		$gioitinh= $result[2];
		$ngaysinh=$result[3];
		$diachi=$result[4];
		$sdt=$result[5];
		$cccd=$result[6];
		$ngaydk=$result[7];
		$diemtichluy=$result[8];
		$loaitk=$result[9];
		$email=$result[10];
	}

}
if (!empty($_POST)) {
	if (isset($_POST['tentv'])) {
		$tentv = $_POST['tentv'];
		$gioitinh = $_POST['gioitinh'];
		$ngaysinh= $_POST['ngaysinh'];
		$diachi = $_POST['diachi'];
		$sdt = $_POST['sdt'];
		$cccd = $_POST['cccd'];
		$ngaydk = $_POST['ngaydk'];
		$diemtichluy = $_POST['diemtichluy'];
		$loaitk = $_POST['loaitk'];
		$email = $_POST['email'];
	}
	if (isset($_POST['matv'])) {
		$matv = $_POST['matv'];
	}

	if (!empty($tentv)) {
		$sql = "UPDATE `thanhvien` SET `tentv`='$tentv',`gioitinh`='$gioitinh',`ngaysinh`='$ngaysinh',
		`diachi`='$diachi',`sdt`='$sdt',`cccd`='$cccd',`ngaydk`='$ngaydk',`diemtichluy`='$diemtichluy',
		`loaitk`='$loaitk',`email`='$email' WHERE `matv`='$matv' ";
		
        execute($sql);

		header('Location: index.php');
		die();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sửa thành viên</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                <a class="navbar-brand" asp-area="" asp-controller="Home" asp-action="Index">ADMIN</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
					<ul class="nav nav-tabs">
					<li class="nav-item">
							<a class="nav-link " href="../phim/">Quản lý phim</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../lichchieu/">Quản lý lịch chiếu</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../sanpham/">Quản lý sản phẩm</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../khuyenmai/">Quản lý khuyến mãi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " href="../nhanvien/">Quản lý nhân viên</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">Quản lý thành viên</a>
						</li>
					</ul>
				</div>
            </div>
        </nav>
    </header>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa thành viên</h2>
			</div>
			<div class="panel-body">
				<form method="post">
				<div class="form-group">
					  <label for="tentv">Tên thành viên:</label>
					  <input required="true" type="text" class="form-control" id="tentv" name="tentv" value="<?=$tentv?>">
					  
					</div>
					<div class="form-group">
					  <label for="gioitinh">Giới tính (nam=0, nữ=1):</label><br>
					  <input required="true" type="number" class="form-control" id="gioitinh" name="gioitinh" value="<?=$gioitinh?>">
					</div>
					<div class="form-group">
					  <label for="ngaysinh">Ngày sinh (sửa theo định dạng có sẵn):</label>
					  <input required="true" type="text" class="form-control" id="ngaysinh" name="ngaysinh" value="<?=$ngaysinh?>">
					</div>
					<div class="form-group">
                        <label for="diachi">Địa chỉ:</label><br>
                        <input required="true" type="text" class="form-control" id="diachi" name="diachi" value="<?=$diachi?>">
                    </div>
					<div class="form-group">
					  <label for="sdt">Số điện thoại:</label>
					  <input required="true" type="number" class="form-control" id="sdt" name="sdt" value="<?=$sdt?>">
					</div>
					<div class="form-group">
					  <label for="cccd">Căn cước công dân:</label>
					  <input required="true" type="number" class="form-control" id="cccd" name="cccd" value="<?=$cccd?>">
                    </div>
					<div class="form-group">
					  <label for="ngaydk">Ngày đăng ký (sửa theo định dạng có sẵn):</label>
					  <input required="true" type="text" class="form-control" id="ngaydk" name="ngaydk" value="<?=$ngaydk?>">
					</div>
					<div class="form-group">
					  <label for="diemtichluy">Điểm tích lũy:</label>
					  <input required="true" type="number" min="0" class="form-control" id="diemtichluy" name="diemtichluy" value="<?=$diemtichluy?>">
                    </div>
					<div class="form-group">
					  <label for="loaitk">Loại tài khoản:</label>
					  <input required="true" type="text" class="form-control" id="loaitk" name="loaitk" value="<?=$loaitk?>">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="text" class="form-control" id="email" name="email" value="<?=$email?>">
					</div>
					
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>