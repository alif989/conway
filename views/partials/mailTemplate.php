<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">  
	</head>
	<body>
		<style type="text/css">
		.inputList {
			list-style: none;
		}
		.mailContainer {
			max-width: 560px;
			display: block;
			padding: 15px;
			margin-bottom: 20px;
			background-color: #fff;
			border: 1px solid transparent;
			border-radius: 4px;
			-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
			box-shadow: 0 1px 1px rgba(0,0,0,.05);
		}
		</style>
		<div class="mailContainer">
			<ul class="inputList">
				<?php
				foreach ($postData as $key => $value) {
				//exclude inputes
				if ($key == 'page' || $key == 'subject') {
					continue;
				}
				echo '<li><b>' . ucwords(str_replace('_', ' ', $key)) . '</b>: ' . trim($value) . '</li>';
				}
				echo '<li><b>User IP:</b> ' . Flight::request()->ip . '</li>';
				date_default_timezone_set('EST');
				echo '<li><b>Time:</b> ' . date('m-d-y H:i') . ' EST</li>';
				?>
			</ul>
		</div>
	</body>
</html>