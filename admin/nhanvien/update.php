<?php
require_once ('../../db/dbhelper.php');
$manv=$tennv='';
if (isset($_GET['manv'])) {
	$manv   = $_GET['manv'];
	$sql          = "select * from nhanvien where manv='$manv'";
	$result = executeSingleResult($sql);
	
	if ($result != null) {
		$tennv = $result[1];
		$gioitinh= $result[2];
		$ngaysinh=$result[3];
		$diachi=$result[4];
		$sdt=$result[5];
		$ngayvaolam=$result[6];
		$chucvu=$result[7];
		$luong=$result[8];
		$cccd=$result[9];
	}

}
if (!empty($_POST)) {
	if (isset($_POST['tennv'])) {
		$tennv = $_POST['tennv'];
		$gioitinh = $_POST['gioitinh'];
		$ngaysinh= $_POST['ngaysinh'];
		$diachi = $_POST['diachi'];
		$sdt = $_POST['sdt'];
		$ngayvaolam = $_POST['ngayvaolam'];
		$chucvu = $_POST['chucvu'];
		$luong = $_POST['luong'];
		$cccd = $_POST['cccd'];
	}
	if (isset($_POST['manv'])) {
		$manv = $_POST['manv'];
	}

	if (!empty($tennv)) {
		$sql = "UPDATE `nhanvien` SET `tennv`='$tennv',`gioitinh`='$gioitinh',`ngaysinh`='$ngaysinh',
		`diachi`='$diachi',`sdt`='$sdt',`ngayvaolam`='$ngayvaolam',`chucvu`='$chucvu',
		`luong`='$luong',`cccd`='$cccd' WHERE `manv`='$manv' ";
		
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
	<title>Sửa nhân viên</title>
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
							<a class="nav-link active" href="#">Quản lý nhân viên</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../thanhvien/">Quản lý thành viên</a>
						</li>
					</ul>
				</div>
            </div>
        </nav>
    </header>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa nhân viên</h2>
			</div>
			<div class="panel-body">
				<form method="post">
				<div class="form-group">
					  <label for="tennv">Tên nhân viên:</label>
					  <input required="true" type="text" class="form-control" id="tennv" name="tennv" value="<?=$tennv?>">
					  
					</div>
					<div class="form-group">
					  <label for="gioitinh">Giới tính (nam=0, nữ=1):</label><br>
					  <input required="true" type="number" min="0" max="1" class="form-control" id="gioitinh" name="gioitinh" value="<?=$gioitinh?>">
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
					  <label for="ngayvaolam">Ngày vào làm (sửa theo định dạng có sẵn):</label>
					  <input required="true" type="text" class="form-control" id="ngayvaolam" name="ngayvaolam" value="<?=$ngayvaolam?>" >
					</div>
					<div class="form-group">
					  <label for="chucvu">Chức vụ:</label>
					  <input required="true" type="text" class="form-control" id="chucvu" name="chucvu" value="<?=$chucvu?>">
					</div>
					<div class="form-group">
					  <label for="luong">Lương:</label>
					  <input required="true" type="number" min="1000000" step="100000" class="form-control" id="luong" name="luong" value="<?=$luong?>">
					</div>
					<div class="form-group">
					  <label for="cccd">Căn cước công dân:</label>
					  <input required="true" type="number" class="form-control" id="cccd" name="cccd" value="<?=$cccd?>"><br>
                    </div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>