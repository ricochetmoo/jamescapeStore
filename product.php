<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Jamescape Store</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700|Comfortaa:300,400|Roboto+Condensed:700,700i" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/store.css" />
	</head>
	<body>
		<section class="header">
			<a href="index.php">
				<div class="container">
					<h1 class="display-5"><span class="regular">Jamescape</span> <span class="light">Store</span></h1>
				</div>
			</a>
		</section>
		<section class="feature">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h2 class="white">NHS Teddy Bears</h2>
						<p class="lead">100% of profits from our latest merchandise line go directly to support the NHS.</p>
						<p>These stylish teddy bears adorning the Jamescape TV logo across their t-shirts and an adorable "Supporting our NHS" ribbon are a great way to remember these challenging times for years to come while supporting those who are leading the battle against the virus.</p>
						<p>This limited edition merchandise line is sold directly by Jamescape and is available to buy individually or in a family pack of 5!</p>
						<h2 class="white">£4.00 <a href="" class="btn btn-light btn-lg">Pre-order now</a></h2>
					</div>
					<div class="col-md-4">
						<h4 class="white">All pre-orders come with a signed Jamescape TV postcard!</h4>
					</div>
				</div>
			</div>
		</section>
		<section class="main">
			<div class="container">
				<?php
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://grumio.uk/cockpit/api/collections/get/merchandiseItem");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("populate" => 1, "filter" => array("_id" => $_GET['id']))));
				curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
				$result = curl_exec($ch);
				curl_close($ch);

				$data = json_decode($result);

				$entry = $data->entries[0];
				?>
				<div class="row">
					<div class="col-md-4">
						<img class="productImage" src="https://grumio.uk<?php echo $entry->images[0]->path ?>" />
					</div>
					<div class="col-md-8">
						<h2><?php echo $entry->name; ?></h2>
						<p class="lead"><?php echo $entry->price; ?></p>
						<p><?php echo $entry->description; ?></p>
						<div class="buyInfoButtons">
							<a href="<?php echo $entry->purchaseUrl ?>" class="btn btn-lg btn-primary">Buy now</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="footer">
			<p>Copyright &copy; Jamescape MMXX</p>
		</section>
	</body>
</html>