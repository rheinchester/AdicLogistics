<?php
	include_once 'includes/customer.php';
	include_once 'includes/services.php';
	include_once 'header_template.php';
	$msg = "";
?>
<!doctype html>
<html>
	<head>
		<title></title>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width initial-scale=1.0'>
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>

	<body>
		<div class="container">

			<header class='row'>
				<nav>
					<div>
						<button>
							<span class='sr-only'>Toggle Navigation</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
						<a href="" class='navbar-brand'>Laundry</a>
					</div>
					<div>
						<ul>

						</ul>
					</div>
				</nav>
			</header>
			

			<div class='row'>
				<article class='col col-lg-9 col-md-8 col-sm-9'>
					<div class='row'>
						<?php echo $msg; ?>
					</div>
					<div class='row'>
						<h3>Customer List</h3>
					</div>					
					<section class='row'>
<?php
	 $customers = Customer::find($customer->email);
	$table = "<table class='table table-hover table-bordered table-striped'>
				<thead>
					<tr>
						<th>S/No.</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Service</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>";
				// $i = 1;
	 foreach ($customers as $customer) {
		$service = Service::find($customer->service_id);
		$table .="<tr>
					<td>$i</td>
					<td>{$customer->firstname}</td>
					<td>{$customer->lastname}</td>
					<td>{$customer->email}</td>
					<td value ='{$customer->service_id}'>{$service->name}</td>
					<td><a class='btn btn-info' href='Add_customer.php?id={$customer->email}'>Edit</a></td>
					<td><a class='btn btn-danger' href='customer_delete.php?id={$customer->email}'>Delete</a></td>
				</tr>";
				$i++;
	}
	$table.="</tbody></table>";
	echo $table;
?>
					</section>	
				</article>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>
</html>
<?php 
include_once 'footer_template.php';
 ?>