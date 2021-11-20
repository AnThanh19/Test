<?php
require_once ('../../db/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin</title>
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
				<h2 class="text-center">Danh sách phim</h2>
			</div>
			<div class="panel-body">
				<a href="insert.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Phim</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">Mã phim</th>
							<th>Tên phim</th>
							<th>Thời lượng</th>
							<th>Ngôn ngữ</th>
							<th>Thể loại</th>
							<th>Đạo diễn</th>
							<th>Diễn viên</th>
							<th>Mô tả</th>
							<th>Độ tuổi</th>
							<th>Trailer</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach danh muc tu database
$sql          = "select * from phim";
$result = executeResult($sql);
foreach ($result as $row) 
{
	echo "<tr>
				<td>$row[0]</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>$row[4]</td>
				<td>$row[5]</td>
				<td>$row[6]</td>
				<td>$row[7]</td>
				<td>$row[8]</td>
				<td>$row[9]</td>
				<td>
					<a href='update.php?maphim=$row[0]'><button class='btn btn-warning'>Sửa</button></a>
				</td>
				<td>
					<button class='btn btn-danger' onclick='deleteCategory($row[0])'>Xoá</button>
				</td>
		</tr>";
					
}
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteCategory(maphim) {
			var option = confirm('Bạn có chắc chắn muốn xoá phim này không?')
			if(!option) {
				return;
			}

			console.log(maphim)
			//ajax - lenh post
			$.post('ajax.php', {
				'maphim': maphim,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>