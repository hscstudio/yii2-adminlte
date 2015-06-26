<?php
use yii\helpers\Html;
use hscstudio\adminlte\widgets\Box;
use hscstudio\adminlte\widgets\InfoBox;
use hscstudio\adminlte\widgets\SmallBox;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Widgets - Box';
$this->params['description'] = '~#!#~';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Box::begin([
	'header' => $this->title,
]);
?>

    <h2>InfoBox</h2>
    <p>Info boxes are used to display statistical snippets. There are two types of info boxes.</p>
	<h3>First Type of Info Boxes</h3>
	<div class="row">
	<div class="col-md-3">
	<?php
	echo InfoBox::widget([
		'type' => 1,
	]);
	?>
	</div>
	<div class="col-md-3">
	<?php
	echo InfoBox::widget([
		'type' => 1,
		'color' => 'blue',
	]);
	?>
	</div>
	<div class="col-md-3">
	<?php
	echo InfoBox::widget([
		'type' => 1,
		'color' => 'green',
	]);
	?>
	</div>
	<div class="col-md-3">
	<?php
	echo InfoBox::widget([
		'type' => 1,
		'color' => 'aqua',
	]);
	?>
	</div>
	</div>
	<div class="box">
	<?php
	highlight_string("
<?php
use hscstudio\adminlte\widgets\InfoBox;
echo InfoBox::widget([
	'type' => 1, // 1 or 2
	'color' => 'red', // green, blue, yellow, etc
    'icon' => 'fa fa-star-o';
    'text' => 'Likes';
    'number' => '99';
]);
?>	
	");
	?>
	</div>
	<h3>Second Type of Info Boxes</h3>
	<div class="row">
	<div class="col-md-3">
	<?php
	echo InfoBox::widget([
		'type' => 2,
		'color' => 'blue',
		'progress' => '66%',
		'progress_description' => 'Increase in 30 Days'
	]);
	?>
	</div>
	<div class="col-md-3">
	<?php
	echo InfoBox::widget([
		'type' => 2,
		'color' => 'green',
		'progress' => '66%',
		'progress_description' => 'Increase in 30 Days'
	]);
	?>
	</div>
	<div class="col-md-3">
	<?php
	echo InfoBox::widget([
		'type' => 2,
		'color' => 'aqua',
		'progress' => '66%',
		'progress_description' => 'Increase in 30 Days'
	]);
	?>
	</div>
	<div class="col-md-3">
	<?php
	echo InfoBox::widget([
		'type' => 2,
		'color' => 'yellow',
		'progress' => '66%',
		'progress_description' => 'Increase in 30 Days'
	]);
	?>
	</div>
	</div>
	<div class="box">
	<?php
	highlight_string("
<?php
use hscstudio\adminlte\widgets\InfoBox;
echo InfoBox::widget([
	'type' => 2, // 1 or 2
	'color' => 'red', // green, blue, yellow, etc
    'icon' => 'fa fa-star-o';
    'text' => 'Likes';
    'number' => '99';
	'progress' => '66%',
	'progress_description' => 'Increase in 30 Days',
]);
?>	
	");
	?>
	</div>
	
	<h2>Box</h2>
	<p>The box component is the most widely used component through out this template. You can use it for anything from displaying charts to just blocks of text. It comes in many different styles that we will explore below.</p>
	
	<h3>Default Box Markup</h3>
	<div class="row">
	<div class="col-md-3">
	<?php
	Box::begin([
		'header' => 'Header',
		'toolboxs' => [
			'<span data-toggle="tooltip" title="" class="badge bg-default" data-original-title="3 New Messages">3</span>',
			'collapse',
			'remove',
		],
		'footer' => 'Footer',
		'variant' => 'default',
		'solid' => false,
		'overlay' => false,		
	]);
	?>
	Test
	<?php
	Box::end();
	?>
	</div>
	<div class="col-md-3">
	<?php
	Box::begin([
		'header' => 'Header',
		'toolboxs' => [
			'<span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="3 New Messages">3</span>',
			'collapse',
			'remove',
		],
		'footer' => 'Footer',
		'variant' => 'success',
		'solid' => true,
		'overlay' => false,		
	]);
	?>
	Test
	<?php
	Box::end();
	?>
	</div>
	<div class="col-md-3">
	<?php
	Box::begin([
		'header' => 'Header',
		'toolboxs' => [
			'<span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span>',
			'collapse',
			'remove',
		],
		'footer' => 'Footer',
		'variant' => 'warning',
		'solid' => false,	
		'overlay' => false,		
	]);
	?>
	Test
	<?php
	Box::end();
	?>
	</div>
	<div class="col-md-3">
	<?php
	Box::begin([
		'header' => 'Header',
		'toolboxs' => [
			'collapse',
			'remove',
		],
		'footer' => 'Footer',
		'variant' => 'primary',
		'solid' => true,	
		'overlay' => true,			
	]);
	?>
	Test
	<?php
	Box::end();
	?>
	</div>
	</div>
	<div class="box">
	<?php
	highlight_string("
<?php
use hscstudio\adminlte\widgets\Box;
Box::begin([
	'header' => 'Header',
	'toolboxs' => [
		'<span data-toggle=\"tooltip\" title=\"\" class=\"badge bg-green\" data-original-title=\"3 New Messages\">3</span>',
		'collapse',
		'remove',			
	],
	'footer' => 'Footer',
	'variant' => 'default', // primary, success, info, warning, danger
	'solid' => false,
	'overlay' => false,
]);
?>
Test
<?php
Box::end();
?>
	");
	?>
	</div>
	
	<h2>SmallBox</h2>
    <p>Small boxes are used to display statistical snippets. There are two types of small boxes.</p>
	<div class="row">
	<div class="col-md-3">
	<?php
	echo SmallBox::widget();
	?>
	</div>
	<div class="col-md-3">
	<?php
	echo SmallBox::widget([
		'color' => 'yellow', // green, blue, yellow, etc
		'title' => '150',
		'description' => 'New Orders',
		'icon' => 'fa fa-star-o',
		'url' => Url::to(['site/index']),
		'more' => 'More info <i class="fa fa-arrow-circle-right"></i>',
	]);
	?>
	</div>
	<div class="col-md-3">
	<?php
	echo SmallBox::widget([
		'color' => 'red', // green, blue, yellow, etc
		'title' => '150',
		'description' => 'New Orders',
		'icon' => 'fa fa-star-o',
		'url' => Url::to(['site/index']),
		'more' => 'More info <i class="fa fa-arrow-circle-right"></i>',
	]);
	?>
	</div>
	<div class="col-md-3">
	<?php
	echo SmallBox::widget([
		'color' => 'green', // green, blue, yellow, etc
		'title' => '150',
		'description' => 'New Orders',
		'icon' => 'fa fa-star-o',
		'url' => Url::to(['site/index']),
		'more' => 'More info <i class="fa fa-arrow-circle-right"></i>',
	]);
	?>
	</div>
	</div>
	<div class="box">
	<?php
	highlight_string("
<?php
use hscstudio\adminlte\widgets\SmallBox;
echo SmallBox::widget([
	'color' => 'red', // green, blue, yellow, etc
	'title' => '150',
	'description' => 'New Orders',
    'icon' => 'fa fa-star-o',
    'url' => Url::to(['site/index']),
    'more' => 'More info <i class=\"fa fa-arrow-circle-right\"></i>',
]);
?>	
	");
	?>
	</div>

<?php
Box::end();
?>
