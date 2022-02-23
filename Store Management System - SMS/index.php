<?php 
session_start();

$userEmail = $_SESSION['userEmail'];
$userName = $_SESSION['userName'];

if(!empty($userEmail)) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Store Management System || SMS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
	<div class="container bg-light">
		<div class="container-fluid border-bottom border-success">
			<div class="row p-3">
				<div class="col-md-9">
					<h1><a class="text-decoration-none text-success" href="/sms/index.php">Store Management System</a></h1>
				</div>
				<div class="col-md-3">
					<p class="p-3"><?php echo $userName ?> <a class="btn btn-success text-white text-decoration-none" href="/sms/logout.php">Logout</a></p>
				</div>
			</div>
			
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 bg-light p-0 m-0">

					<h5 class="bg-success text-white p-2">Category</h5>
					<ul class="list-group">
						<li class="list-group-item">
							<a class="text-decoration-none" href="/sms/add_category.php">Add Category</a>
						</li>
						<li class="list-group-item">
							<a class="text-decoration-none" href="/sms/category_list.php">Category List</a>
						</li>
					</ul>

					<h5 class="bg-success text-white p-2">Product</h5>
					<ul class="list-group">
						<li class="list-group-item">
							<a class="text-decoration-none" href="/sms/add_product.php">Add Product</a>
						</li>
						<li class="list-group-item">
							<a class="text-decoration-none" href="/sms/product_list.php">Product List</a>
						</li>
					</ul>

					<h5 class="bg-success text-white p-2">Store Product</h5>
					<ul class="list-group">
						<li class="list-group-item">
							<a class="text-decoration-none" href="/sms/add_store_product.php">Add Store Product</a>
						</li>
						<li class="list-group-item">
							<a class="text-decoration-none" href="/sms/store_product_list.php">Store Product List</a>
						</li>
					</ul>

					<h5 class="bg-success text-white p-2">Spend Product</h5>
					<ul class="list-group">
						<li class="list-group-item">
							<a class="text-decoration-none" href="/sms/add_spend_product.php">Add Spend Product</a>
						</li>
						<li class="list-group-item">
							<a class="text-decoration-none" href="/sms/spend_product_list.php">Spend Product List</a>
						</li>
					</ul>

					<h5 class="bg-success text-white p-2">Report</h5>
					<ul class="list-group">
						<li class="list-group-item">
							<a class="text-decoration-none" href="/sms/report.php">Report</a>
						</li>
					</ul>

					<h5 class="bg-success text-white p-2">Users</h5>
					<ul class="list-group">
						<li class="list-group-item">
							<a class="text-decoration-none" href="/sms/user_list.php">Users</a>
						</li>
					</ul>

				</div>
				<div class="col-md-8 p-3 border-start border-success">
					<div class="row border-bottom border-success">
						<div class="col-md-3">
							<a href="/sms/add_category.php"><i class="fas fa-folder-plus fa-5x text-success"></i></a>
							<p>Add Category</p>
						</div>
						<div class="col-md-3">
							<a href="/sms/category_list.php"><i class="fas fa-folder-open fa-5x text-success"></i></a>
							<p>Category List</p>
						</div>
						<div class="col-md-3">
							<a href="/sms/add_product.php"><i class="fas fa-stream fa-5x text-success"></i></a>
							<p>Add Product</p>
						</div>
						<div class="col-md-3">
							<a href="/sms/product_list.php"><i class="fas fa-box-open fa-5x text-success"></i></a>
							<p>Product List</p>
						</div>
					</div>

					<div class="row border-bottom border-success mt-4">
						<div class="col-md-3">
							<a href="/sms/add_store_product.php"><i class="fas fa-trash-restore fa-5x text-success"></i></a>
							<p>Add Store Product</p>
						</div>
						<div class="col-md-3">
							<a href="/sms/store_product_list.php"><i class="fas fa-box fa-5x text-success"></i></a>
							<p>Store Product List</p>
						</div>
						<div class="col-md-3">
							<a href="/sms/add_spend_product.php"><i class="fas fa-plus-circle fa-5x text-success"></i></a>
							<p>Add Spend Product</p>
						</div>
						<div class="col-md-3">
							<a href="/sms/spend_product_list.php"><i class="fas fa-window-restore fa-5x text-success"></i></a>
							<p>Spend Product List</p>
						</div>
					</div>

					<div class="row border-bottom border-success mt-4">
						<div class="col-md-3">
							<a href="/sms/report.php"><i class="fas fa-chart-bar fa-5x text-success"></i></a>
							<p>Report</p>
						</div>
						<div class="col-md-3">
							<a href="/sms/add_user.php"><i class="fas fa-user-plus fa-5x text-success"></i></a>
							<p>Add User</p>
						</div>
						<div class="col-md-3">
							<a href="/sms/user_list.php"><i class="fas fa-users fa-5x text-success"></i></a>
							<p>User List</p>
						</div>
						<div class="col-md-3">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid border-top border-success">
			<p class="text-center p-2">Copyright: SM Solution</p>
		</div>
	</div>
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
