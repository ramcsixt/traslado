<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistema - Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="<?php echo base_url("Public/fonts/all.css")?>" rel="stylesheet">
	<link href="<?php echo base_url("Public/system/css/toastr.css")?>" rel="stylesheet">

	<style>
		html, body {
			height: 100%;
		}
		.btn-orange {
			color: #fff;
			background-color: #ef7b00;
			border-color: #ef7b00;
		}
		.btn-outline-orange {
			color: #ef7b00;
			background-color: #fff;
			border-color: #ef7b00;
		}
		.btn-orange:hover {
			color: #ef7b00;
			text-decoration: none;
			background-color: white;
		}
		.form-control:focus {
			color: #495057;
			background-color: #fff;
			/* border-color: #ef7b004f; */
			outline: 0;
			/* box-shadow: 0 0 0 0.2rem rgba(239, 123, 0, 0.52); */
			border-bottom: 1.5px solid #ef7b004f !important;
			border-color: #ffffff00;
			outline: 0;
			box-shadow: none;
		}
		body{
			background-color: #4e4e4e;
			font-size: 12px;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: center center;
			align-items: center;
			padding-top: 40px;
			padding-bottom: 40px;
			display: flex;
		}

		.my-login-page .brand {
			margin: 17px auto;
		}
	</style>
</head>

<body class="text-center">
