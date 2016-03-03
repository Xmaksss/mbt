<?php 
	if(isset($_POST["send"])){
		$name = trim(stripslashes(htmlspecialchars($_POST["name"])));
		$from = trim(stripslashes(htmlspecialchars($_POST["from"])));
		$subject = trim(stripslashes(htmlspecialchars($_POST["subject"])));
		$message = trim(stripslashes(htmlspecialchars($_POST["message"])));
		
		session_start();
		$_SESSION["name"] = $name;
		$_SESSION["from"] = $from;
		$_SESSION["subject"] = $subject;
		$_SESSION["message"] = $message;
		
		$error = false;
		$error_name = "";
		$error_from = "";
		$error_subject = "";
		$error_message = "";
		$message_done = "";
		
		if ($name == "" || strlen($name) <= 3){
			$error = true;
			$error_name = "Введіть імя";
			$class_name = "error-ico";
		} else {
			$class_name = "no-error-ico";
		}
		
		if (strlen($from) < 6 || !filter_var($from, FILTER_VALIDATE_EMAIL)){
			$error = true;
			$error_from = "Введіть коректний адрес";
			$class_from = "error-ico";
		} else {
			$class_from = "no-error-ico";
		}
		
		if ($subject == "" || strlen($subject) <= 3){
			$error = true;
			$error_subject = "Введіть тему листа";
			$class_subject = "error-ico";
		} else {
			$class_subject = "no-error-ico";
		}
		
		if ($message == "" || strlen($message) <= 10){
			$error = true;
			$error_message = "Введіть текст повідомлення";
		}
		
		if ($error == false){
			$to = "bad.maks.ne@mail.ru";
			$headers = "From:$from\r\nReply-to:$from\r\nContent-type: text/plain;Charset=utf-8\r\n";
			$subject = "?utf-8?B?".base64_encode($subject)."?=";
			
			mail($to, $subject, $message, $headers);
			#header("Location: ".$_SERVER["REQUEST_URI"]);
			
			$_SESSION["name"] = "";
			$_SESSION["from"] = "";
			$_SESSION["subject"] = "";
			$_SESSION["message"] = "";
			$class_name = "";
			$class_from = "";
			$class_subject = "";
			$message_done = "Повідомлення відправлене";
			session_destroy();
		}
	}
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Контакти</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name=""viewport" content="width=devise-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="images/icon.png" type="image/png>
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<header>
		<nav class="navbar navbar-default menu" role="navigation">
		  <div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			  <a class="navbar-brand no-mobile" href="index.html"><span>M</span>edical <span>B</span>usiness <span>T</span>echnology</a>
			  <a class="navbar-brand mobile" href="index.html"><span>MBT</span></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right">
				<li>
					<a href="index.html"><span class="mobi-icon"><i class="fa fa-bank"></i> </span>Головна</a>
				</li>
				<li>
					<a href="team.html"><span class="mobi-icon"><i class="fa fa-group"></i> </span>Команда</a>
				</li>
				<li>
					<a href="services.html"><span class="mobi-icon"><i class="fa fa-cogs"></i> </span>Послуги</a>
				</li>
				<li>
					<a href="news.html"><span class="mobi-icon"><i class="fa fa-newspaper-o"></i> </span>Новини</a>
				</li>
				<li class="active-link">
					<a href="contacts.html"><span class="mobi-icon"><i class="fa fa-phone"></i> </span>Контакти</a>
				</li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container -->
		</nav>
	</header>
	<!--body start-->
	
	
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 services-title">Контакти</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gray-col">
				<div class="title">Адреса</div>
				<div class="triangl-left-gray"></div>
				<div class="triangl-right-gray"></div>
				<p class="adress">Україна, м. Київ, вул. Вулична, 17</p>
				<p class="adress">info@mbt.net.ua</p>
				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2543.255537405412!2d30.373153715249874!3d50.39907509894718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zINGD0Lsg0LHQvtCz0L7Qu9GO0LHQvtCy0LAgNg!5e0!3m2!1sru!2sua!4v1456665704901" class="map" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 blue-col">
				<div class="title">Телефон</div>
				<div class="triangl-left"></div>
				<div class="triangl-right"></div>
				<p class="adress">(044) 337-54-45</p>
				<p class="adress">(067) 298-21-12</p>
				<form action="" method="POST">
					<div class="form-group">
						<label for="email-name">Імя: </label><span class="error"> <?php echo $error_name?></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-pencil <?php echo $class_name?>"></i></span>
							<input type="text" name="name" id="email-name" class="form-control" placeholder="Імя" value="<?php echo $_SESSION["name"]?>">
						</div>
					</div>
					<div class="form-group">
						<label for="email-email">E-mail: </label><span class="error"> <?php echo $error_from?></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-pencil <?php echo $class_from?>"></i></span>
							<input type="text" name="from" id="email-email" class="form-control" placeholder="E-mail" value="<?php echo $_SESSION["from"]?>">
						</div>
					</div>
					<div class="form-group">
						<label for="email-subject">Тема: </label><span class="error"> <?php echo $error_subject?></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-pencil <?php echo $class_subject?>"></i></span>
							<input type="text" name="subject" id="email-subject" class="form-control" placeholder="Тема" value="<?php echo $_SESSION["subject"]?>">
						</div>
					</div>
					<div class="form-group">
						<br><span class="error"><?php echo $error_message?></span>
						<textarea name="message" class="form-control" rows="5"><?php echo $_SESSION["message"]?></textarea>
					</div>
					<div class="form-group">
						<span class="no-error-ico"><?php echo $message_done?></span>
						<input type="submit" name="send" class="btn btn-success pull-right btn-margin-bottom" value="Відправити">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	<!--body end-->
	<div class="container-fluid footer">
		<p>&copy Medical Business Technology, 2016</p>
	</div>
	
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>