<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<style media="print">
/* printing */
p,body{
	font-family:  arial,tahoma,verdana,arial,sans-serif;
	font-size:11px;
	color:#333;
}
table{
	width:100%;
}
.wrapper{
	border:1px solid #666;
	margin:3px;
}
hr {
	margin:3px 0;
}
.inner_wrapper{
	
	margin:3px;
	border:1px solid #666;
}

.inner_wrapper1{
	
	margin:3px;
	border:0px solid #666;
	height:860px;
	
}
table td{
	padding:5px 3px;
	text-transform:uppercase;
	border:1px solid #555;
	color:#333;
	
}
table.bottom td{
	border:0px solid #dedede;
	font-size:10px;
	
}
.noborder td,
td.noborder{
	border:0px solid #555 !important;
}
.center{
	text-align:center !important;
	
}

table td.bold, .noborder td.bold{
	font-weight:bold !important;
	color:#333;
}
h1{
	font-size:18px !important;
	text-transform:uppercase;
}
h2{
	font-size:16px !important;
	text-transform:uppercase;
}
h4{
	font-size:11px !important;
	text-transform:uppercase;
}
table td.header2{
	color:#333;
	font-size:16px;
	text-align:center;
	font-weight:bold;

}
table td.label{	
	color:#555;
	font-weight:bold;
}
.email{
	text-transform:lowercase !important;
}
span.notes
{
	font-size:11px;
	color:#888;
}

.footnote{
	font-size:11px;
	color:#777;

	padding:10px;

}
.right{
	text-align:right;
}

/* end print */
</style>

<script> 
$(function(){Loading.hide(); }); 
</script>
<body>
<div class="container" id="page">
	<!-- common header -->
	<?php require_once(Yii::app()->basePath . "/views/layouts/custom/logo.php");?>
	<hr />
	<?php echo $content; ?>
	<?php echo Yii::app()->params['footer_pdf'];?>		

</div>
</body>
</html>