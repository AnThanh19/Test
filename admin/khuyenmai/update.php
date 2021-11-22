<?php
require_once ('../../db/dbhelper.php');

$makm = $ngaybatdau = '';

if (isset($_GET['makm'])) {
	$makm   = $_GET['makm'];
	$sql    = "select * from khuyenmai where makm='$makm'";
	$result = executeSingleResult($sql);
	
	if ($result != null) {
		$ngaybatdau = $result[1];
		$ngayketthuc= $result[2];
		$phantram= $result[3];
	}

}
if (!empty($_POST)) {
	if (isset($_POST['ngaybatdau'])) {
		$ngaybatdau = $_POST['ngaybatdau'];
		$ngayketthuc = $_POST['ngayketthuc'];
		$phantram= $_POST['phantram'];
	
	}
	if (isset($_POST['makm'])) {
		$makm = $_POST['makm'];
	}
	if (!empty($ngaybatdau)) {
		$sql = "UPDATE `khuyenmai` SET `ngaybatdau`='$ngaybatdau',`ngayketthuc`='$ngayketthuc',
			`phantram`='$phantram' WHERE `MAKM`='$makm'";
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
	<title>Sửa khuyến mãi</title>
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
							<a class="nav-link active" href="#">Quản lý khuyến mãi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../nhanvien/">Quản lý nhân viên</a>
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
				<h2 class="text-center">Sửa khuyến mãi</h2>
			</div>
			<div class="panel-body">
				<h3>Lưu ý: sửa theo format có sẵn</h3>
				<form method="post">
					<div class="form-group">
					  <label for="name">Ngày bắt đầu:</label>
					  <input required="true" type="text" class="form-control" id="ngaybatdau" name="ngaybatdau" value="<?=$ngaybatdau?>">
					</div>
					<div class="form-group">
					  <label for="name">Ngày kết thúc:</label>
					  <input required="true" type="text" class="form-control" id="ngayketthuc" name="ngayketthuc" value="<?=$ngayketthuc?>">
					</div>
					<div class="form-group">
					  <label for="thoiluong">Phần trăm:</label>
					  <input required="true" type="number" min="0" max="50" step ="5" class="form-control" id="phantram" name="phantram" value="<?=$phantram?>">
					</div>			
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>