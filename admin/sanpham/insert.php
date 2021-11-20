<?php
require_once ('../../db/dbhelper.php');

$masp = $tensp = '';
if (!empty($_POST)) {
	if (isset($_POST['tensp'])) {
		$tensp = $_POST['tensp'];
		$gia = $_POST['gia'];
	
	}
	if (isset($_POST['masp'])) {
		$masp = $_POST['masp'];
	}

	if (!empty($tensp)) {
		//Luu vao database
		if ($masp == '') {
			$sql = 'INSERT INTO sanpham( `TENSP`, `GIA`) values ("'.$tensp.'","'.$gia.'")';
		} 
        execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['masp'])) {
	$masp       = $_GET['masp'];
	$sql      = 'select * from sanpham where masp = '.$masp;
	$category = executeSingleResult($sql);
	if ($category != null) {
		$tensp = $category['tensp'];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Thêm Sản phẩm</title>
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
						<a class="nav-link" href="../product/">Quản lý sản phẩm</a>
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
				<h2 class="text-center">Thêm Sản phẩm</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên Sản phẩm:</label>
					  <input required="true" type="text" class="form-control" id="tensp" name="tensp" >
					  
					</div>
					<div class="form-group">
					  <label for="thoiluong">Giá:</label>
					  <input required="true" type="number" class="form-control" id="gia" name="gia" >
					</div>
					
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>