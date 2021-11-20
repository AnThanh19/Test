<?php
require_once ('../../db/dbhelper.php');

$maphim = $tenphim = '';
if (!empty($_POST)) {
	if (isset($_POST['tenphim'])) {
		$tenphim = $_POST['tenphim'];
		$thoiluong = $_POST['thoiluong'];
		$ngonngu= $_POST['ngonngu'];
		$theloai = $_POST['theloai'];
		$daodien = $_POST['daodien'];
		$dienvien = $_POST['dienvien'];
		$mota = $_POST['mota'];
		$dotuoi = $_POST['dotuoi'];
		$trailer = $_POST['trailer'];
	}
	if (isset($_POST['maphim'])) {
		$maphim = $_POST['maphim'];
	}

	if (!empty($tenphim)) {
		//Luu vao database
		if ($maphim == '') {
			$sql = 'insert into phim(`TENPHIM`, `THOILUONG`, `NGONNGU`, `THELOAI`, `DAODIEN`, `DIENVIEN`,`MOTA` ,  `DOTUOI`, `TRAILER`) 
				values ("'.$tenphim.'","'.$thoiluong.'","'.$ngonngu.'","'.$theloai.'","'.$daodien.'","'.$dienvien.'","'.$mota.'","'.$dotuoi.'","'.$trailer.'")';
		} 
        execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['maphim'])) {
	$maphim       = $_GET['maphim'];
	$sql      = 'select * from phim where maphim = '.$maphim;
	$category = executeSingleResult($sql);
	if ($category != null) {
		$tenphim = $category['tenphim'];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Thêm Phim</title>
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
						<a class="nav-link active" href="#">Quản lý phim</a>
					</li>
					<li class="nav-item">
							<a class="nav-link" href="../sanpham/">Quản lý lịch chiếu</a>
						</li>
					<li class="nav-item">
						<a class="nav-link" href="../sanpham/">Quản lý sản phẩm</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="../product/">Quản lý khuyến mãi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../product/">Quản lý nhân viên</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../product/">Quản lý thành viên</a>
					</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Phim</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên Phim:</label>
					  <input required="true" type="text" class="form-control" id="tenphim" name="tenphim" >
					  
					</div>
					<div class="form-group">
					  <label for="thoiluong">Thời lượng:</label>
					  <input required="true" type="number" class="form-control" id="thoiluong" name="thoiluong" >
					</div>
					<div class="form-group">
					  <label for="ngonngu">Ngôn ngữ:</label><br>
                        <select class="form-control" id="ngonngu" name="ngonngu">
                            <option value="Tiếng Anh - Phụ đề Tiếng Việt">Tiếng Anh - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Hàn - Phụ đề Tiếng Việt">Tiếng Hàn - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Trung - Phụ đề Tiếng Việt">Tiếng Trung - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Việt">Tiếng Việt</option>
                        </select>
					</div>
					<div class="form-group">
                        <label for="theloai">Thể loại:</label><br>
                        <input required="true" type="text" class="form-control" id="theloai" name="theloai">
                    </div>
					<div class="form-group">
					  <label for="daodien">Đạo diễn:</label>
					  <input required="true" type="text" class="form-control" id="daodien" name="daodien" >
					</div>
					<div class="form-group">
					  <label for="dienvien">Diễn Viên:</label>
					  <input required="false" type="text" class="form-control" id="dienvien" name="dienvien" >
					</div>
					<div class="form-group">
					  <label for="mota">Mô tả:</label>
					  <input required="false" type="text" class="form-control" id="mota" name="mota" >
					</div>
					<div class="form-group">
					  <label for="dotuoi">Độ tuổi:</label>
					  <input required="false" type="number" class="form-control" id="dotuoi" name="dotuoi">
					</div>
					<div class="form-group">
					  <label for="trailer">Trailer:</label>
					  <input required="false" type="text" class="form-control" id="trailer" name="trailer"><br>
                    </div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>