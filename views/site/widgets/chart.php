<?php
use yii\helpers\Html;
use hscstudio\adminlte\widgets\Box;
use hscstudio\adminlte\widgets\InfoBox;
use hscstudio\adminlte\widgets\SmallBox;
use hscstudio\chart\ChartNew;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Widgets - Chart';
$this->params['description'] = '~#!#~';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Box::begin([
	'header' => $this->title,
]);
?>

    <h2>ChartNewJs</h2>
    <div class="row">
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'Doughnut Chart',
		]);
		?>
			<?= ChartNew::widget([
				'type' => 'doughnut',
			]) ?>
			<?php
			highlight_string("
<?php
use hscstudio\chart\ChartNew;
echo ChartNew::widget([
	'type' => 'doughnut',
	'title'=>'PHP Framework',
	'labels'=>['Yii','Laravel','CI','Symfony'],
	'datasets' => [
		['title'=>'2014','data'=>[35,45,15,5]],
		['title'=>'2015','data'=>[45,35,5,15]],
	],
]);
?>	
			");
			?>
		<?php
		Box::end();
		?>
		</div><!-- /.col (LEFT) -->
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'Pie Chart',
		]);
		?>
			<?= ChartNew::widget([
				'type' => 'pie',
			]) ?>
			<?php
			highlight_string("
<?php
use hscstudio\chart\ChartNew;
echo ChartNew::widget([
	'type' => 'pie',
	'title'=>'PHP Framework',
	'labels'=>['Yii','Laravel','CI','Symfony'],
	'datasets' => [
		['title'=>'2014','data'=>[35,45,15,5]],
		['title'=>'2015','data'=>[45,35,5,15]],
	],
]);
?>	
			");
			?>
		<?php
		Box::end();
		?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'Bar Chart',
		]);
		?>
			<?= ChartNew::widget([
				'type' => 'bar',
			]) ?>
			<?php
			highlight_string("
<?php
use hscstudio\chart\ChartNew;
echo ChartNew::widget([
	'type' => 'bar',
	'title'=>'PHP Framework',
	'labels'=>['Yii','Laravel','CI','Symfony'],
	'datasets' => [
		['title'=>'2014','data'=>[35,45,15,5]],
		['title'=>'2015','data'=>[45,35,5,15]],
	],
]);
?>	
			");
			?>
		<?php
		Box::end();
		?>
		</div><!-- /.col (LEFT) -->
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'Line Chart',
		]);
		?>
			<?= ChartNew::widget([
				'type' => 'line',
			]) ?>
			<?php
			highlight_string("
<?php
use hscstudio\chart\ChartNew;
echo ChartNew::widget([
	'type' => 'line',
	'title'=>'PHP Framework',
	'labels'=>['Yii','Laravel','CI','Symfony'],
	'datasets' => [
		['title'=>'2014','data'=>[35,45,15,5]],
		['title'=>'2015','data'=>[45,35,5,15]],
	],
]);
?>	
			");
			?>
		<?php
		Box::end();
		?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'HorizontalBar Chart',
		]);
		?>
			<?= ChartNew::widget([
				'type' => 'horizontalBar',
			]) ?>
			<?php
			highlight_string("
<?php
use hscstudio\chart\ChartNew;
echo ChartNew::widget([
	'type' => 'horizontalBar',
	'title'=>'PHP Framework',
	'labels'=>['Yii','Laravel','CI','Symfony'],
	'datasets' => [
		['title'=>'2014','data'=>[35,45,15,5]],
		['title'=>'2015','data'=>[45,35,5,15]],
	],
]);
?>	
			");
			?>
		<?php
		Box::end();
		?>
		</div><!-- /.col (LEFT) -->
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'Radar Chart',
		]);
		?>
			<?= ChartNew::widget([
				'type' => 'radar',
			]) ?>
			<?php
			highlight_string("
<?php
use hscstudio\chart\ChartNew;
echo ChartNew::widget([
	'type' => 'radar',
	'title'=>'PHP Framework',
	'labels'=>['Yii','Laravel','CI','Symfony'],
	'datasets' => [
		['title'=>'2014','data'=>[35,45,15,5]],
		['title'=>'2015','data'=>[45,35,5,15]],
	],
]);
?>	
			");
			?>
		<?php
		Box::end();
		?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'StackedBar Chart',
		]);
		?>
			<?= ChartNew::widget([
				'type' => 'stackedBar',
			]) ?>
		<?php
		Box::end();
		?>
		<?php
			highlight_string("
<?php
use hscstudio\chart\ChartNew;
echo ChartNew::widget([
	'type' => 'stackedBar',
	'title'=>'PHP Framework',
	'labels'=>['Yii','Laravel','CI','Symfony'],
	'datasets' => [
		['title'=>'2014','data'=>[35,45,15,5]],
		['title'=>'2015','data'=>[45,35,5,15]],
	],
]);
?>	
			");
			?>
		</div><!-- /.col (LEFT) -->
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'HorizontalStackedBar Chart',
		]);
		?>
			<?= ChartNew::widget([
				'type' => 'horizontalStackedBar',
			]) ?>
			<?php
			highlight_string("
<?php
use hscstudio\chart\ChartNew;
echo ChartNew::widget([
	'type' => 'horizontalStackedBar',
	'title'=>'PHP Framework',
	'labels'=>['Yii','Laravel','CI','Symfony'],
	'datasets' => [
		['title'=>'2014','data'=>[35,45,15,5]],
		['title'=>'2015','data'=>[45,35,5,15]],
	],
]);
?>	
			");
			?>
		<?php
		Box::end();
		?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'PolarArea Chart',
		]);
		?>
			<?= ChartNew::widget([
				'type' => 'polarArea',
			]) ?>
			<?php
			highlight_string("
<?php
use hscstudio\chart\ChartNew;
echo ChartNew::widget([
	'type' => 'polarArea',
	'title'=>'PHP Framework',
	'labels'=>['Yii','Laravel','CI','Symfony'],
	'datasets' => [
		['title'=>'2014','data'=>[35,45,15,5]],
		['title'=>'2015','data'=>[45,35,5,15]],
	],
]);
?>	
			");
			?>
		<?php
		Box::end();
		?>
		</div><!-- /.col (LEFT) -->
		<div class="col-md-6">

		</div>
	</div>
<?php
Box::end();