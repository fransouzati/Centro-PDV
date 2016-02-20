<!DOCTYPE html>
<html lang="en">
	<head>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

		<!-- CSS JQuery UI -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

		<!-- JS JQuery UI -->
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->

		<style type="text/css">
			html{
				background: url(/img/bg.jpg) no-repeat center center fixed;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				height: 100%;
			}
			body{
				padding: 70px 0px;
				min-height: 100%;
				background: url(/img/dotted.png);

			}
			#logo{
				margin-top: 15px;
  				margin-bottom: 10px;
			}
			#logo img{
  				margin-bottom: 10px;
			}
		</style>

	</head>

	<body>

			<?php // echo $this->Element('navigation-home'); ?>

			<div class="container">
				<div class="col-md-4 col-md-offset-4" id="logo">
					<img class="img-responsive" src="/img/centro-mercantil.svg" alt="">

					<?php echo $this->Session->flash(); ?>
				</div>

				<?php echo $this->fetch('content'); ?>

			</div><!-- /.container -->


	</body>
</html>
