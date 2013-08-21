<?
    include $argv[1];
    if (!function_exists("content")) {
	fwrite(STDERR, "\nERROR: function content() not defined\n\n");
	exit(1);
    }
?><!DOCTYPE html>
<html>
<head>
<!-- http mode only
<link rel="stylesheet/less" type="text/css" href="cv.less" />
<script src="less-1.4.1.min.js" type="text/javascript"></script>
-->

<!-- file mode or http mode-->
<link rel="stylesheet" type="text/css" href="cv.less.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="break-page.js"></script>
</head>

<body onload="adjust_page()">

<? if (function_exists("cover_letter")) { ?>
<div class="A4Portrait hidden">
<div class="INNER">
	<div class="letter-inner">
	<?= cover_letter() ?>
	</div>
</div>
</div>
<?  } ?>

<div class="A4Portrait">
<div class="INNER">
	<div class="bizcard-hk float-left clearnone">
	<div class="bizcard-us float-right top-margin-54mm-2in">
	<div class="scissors-container"><i class="icon-cut"></i></div>
	<div class="right-bottom align-right">
		<h1 class="name">&nbsp;</h1>
		<h1 class="addr"><?= $addr1 ?></h2>
		<h1 class="addr"><?= $addr2 ?></h2>
		<h1 class="addr"><?= $addr3 ?></h2>
		<h1 class="addr"><?= $addr4 ?></h2>
	</div>
	</div>
	</div>

	<div class="bizcard-hk float-right clearnone">
	<div class="outline bizcard-us float-left top-margin-54mm-2in">
	<div class="left-bottom">
		<h1 class="name"><?= $name ?></h1>
		<hr class="bizcard-hr" />
		<h1 class="addr"><?= $info1 ?></h2>
		<h1 class="addr"><?= $info2 ?></h2>
		<h1 class="addr"><?= $info3 ?></h2>
		<h1 class="addr"><?= $info4 ?></h2>
	</div>
	</div>
	</div>

	<?= content() ?>
</div>
</div>
</body>
</html>

