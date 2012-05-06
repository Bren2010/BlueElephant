<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Blue Elephant<?php if (isset($title)): ?> | <?php echo $title; ?><?php endif; ?></title>

		<!-- Le styles -->
		<link href="<?php echo Url::format('themes/bootstrap/css/bootstrap.min.css', true); ?>" rel="stylesheet">
		<style type="text/css">
		  body {
			padding-top: 60px;
			padding-bottom: 40px;
		  }
		  .sidebar-nav {
			padding: 9px 0;
		  }
		</style>
		<link href="<?php echo Url::format('themes/bootstrap/css/bootstrap-responsive.min.css', true); ?>" rel="stylesheet">
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- Start header -->
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</a>
					<a class="brand" href="<?php echo Url::format('/'); ?>">HackThisSite</a>
					
					<div class="nav-collapse">
						<ul class="nav">
							<li><a href="<?php echo Url::format('/'); ?>">Home</a></li>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<!-- End header -->
		
		<div class="container"><div class="row">
			<!-- Start navigation -->
			<div class="span3">
				<div class="well sidebar-nav">
					<ul class="nav nav-list">
						<li class="nav-header">Search</li>
						<li>
							<form class="form-search" action="<?php echo Url::format('search'); ?>" method="post">
								<input type="text" name="query" placeholder="Search" class="input-medium search-query" />
							</form>
						</li>
<?php foreach ($leftNav as $title => $section): ?>
						<li class="nav-header"><?php echo $title; ?></li>
<?php foreach ($section as $name => $location): ?>
						<li><a href="<?php echo Url::format($location); ?>"><?php echo $name; ?></a></li>
<?php endforeach;endforeach; ?>
					</ul>
				</div>
			</div>
			<!-- End navigation -->
			
			<!-- Start content -->
			<div class="span9">
<?php
$notices = Error::getAllNotices();
if (Error::has() && !empty($notices)) {
	echo '<div class="alert alert-info">';

	foreach($notices as $notice) { 
		echo $notice, '<br />';
	}
	echo '</div><br />';
}

$errors = Error::getAllErrors();
if (Error::has() && !empty($errors)) {
	echo '<div class="alert alert-error">';
	foreach($errors as $error) {
		echo $error, '<br />';
	}
	echo '</div><br />';
}
?>
				<?php echo $content; ?>
			</div>
			<!-- End content -->
		</div></div>
		
		<script src="<?php echo Url::format('themes/jquery.js', true); ?>"></script>
		<script src="<?php echo Url::format('themes/bootstrap/js/bootstrap.min.js', true); ?>"></script>
	</body>
</html>
