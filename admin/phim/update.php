<?php
require_once ('../../db/dbhelper.php');
$maphim=$tenphim='';
if (isset($_GET['maphim'])) {
	$maphim   = $_GET['maphim'];
	$sql          = "select * from phim where maphim='$maphim'";
	$result = executeSingleResult($sql);
	
	if ($result != null) {
		$tenphim = $result[1];
		$thoiluong= $result[2];
		$ngonngu=$result[3];
		$theloai=$result[4];
		$daodien=$result[5];
		$dienvien=$result[6];
		$mota=$result[7];
		$dotuoi=$result[8];
		$trailer=$result[9];
	}

}
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
		$sql = "UPDATE `phim` SET `TENPHIM`='$tenphim',`THOILUONG`='$thoiluong',`NGONNGU`='$ngonngu',
		`THELOAI`='$theloai',`DAODIEN`='$daodien',`DIENVIEN`='$dienvien',`MOTA`='$mota',
		`DOTUOI`='$dotuoi',`TRAILER`='$trailer' WHERE `MAPHIM`='$maphim' ";
		
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
	<title>Sửa Phim</title>
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
				<h2 class="text-center">Sửa Phim</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên Phim:</label>
					  <input required="true" type="text" class="form-control" id="tenphim" name="tenphim" value="<?=$tenphim?>">
					  
					</div>
					<div class="form-group">
					  <label for="thoiluong">Thời lượng:</label>
					  <input required="true" type="text" class="form-control" id="thoiluong" name="thoiluong" value="<?=$thoiluong?>">
					</div>
					<div class="form-group">
					  <label for="ngonngu">Ngôn ngữ:</label>
					  <select class="form-control" id="ngonngu" name="ngonngu" >
                            <option value="Tiếng Anh - Phụ đề Tiếng Việt">Tiếng Anh - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Hàn - Phụ đề Tiếng Việt">Tiếng Hàn - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Trung - Phụ đề Tiếng Việt">Tiếng Trung - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Việt">Tiếng Việt</option>
                        </select>
					  
					</div>
					<div class="form-group">
					  <label for="theloai">Thể loại:</label>
					  <input required="true" type="text" class="form-control" id="theloai" name="theloai" value="<?=$theloai?>">
					</div>
					<div class="form-group">
					  <label for="daodien">Đạo diễn:</label>
					  <input required="true" type="text" class="form-control" id="daodien" name="daodien" value="<?=$daodien?>">
					</div>
					<div class="form-group">
					  <label for="dienvien">Diễn Viên:</label>
					  <input required="false" type="text" class="form-control" id="dienvien" name="dienvien" value="<?=$dienvien?>">
					</div>
					<div class="form-group">
					  <label for="mota">Mô tả:</label>
					  <input required="false" type="text" class="form-control" id="mota" name="mota" value="<?=$mota?>">
					</div>
					<div class="form-group">
					  <label for="dotuoi">Độ tuổi:</label>
					  <input required="false" type="text" class="form-control" id="dotuoi" name="dotuoi" value="<?=$dotuoi?>">
					</div>
					<div class="form-group">
					  <label for="trailer">Trailer:</label>
					  <input required="false" type="text" class="form-control" id="trailer" name="trailer" value="<?=$trailer?>">
					
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>