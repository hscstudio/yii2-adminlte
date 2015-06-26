<?php
use yii\helpers\Html;
use hscstudio\adminlte\widgets\Box;
use hscstudio\adminlte\widgets\InfoBox;
use hscstudio\adminlte\widgets\SmallBox;
use vova07\imperavi\Widget;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Widgets - Imperavi';
$this->params['description'] = '~#!#~';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Box::begin([
	'header' => $this->title,
]);
?>
    <div class="row">
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'Imperavi',
		]);
		?>
			<?= Widget::widget([
				'name' => 'redactor',
				'settings' => [
					'lang' => 'en',
					'minHeight' => 200,
					'plugins' => [
						'clips',
						'fullscreen'
					]
				]
			]); ?>
			<?php
			highlight_string("
<?php
use vova07\imperavi\Widget;

echo Widget::widget([
    'name' => 'redactor',
    'settings' => [
        'lang' => 'en',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen'
        ]
    ]
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
			'header' => 'Imperavi',
		]);
		?>
			<?= Widget::widget([
				'name' => 'redactor2',
				'settings' => [
					'lang' => 'en',
					'minHeight' => 200,
					'fileUpload' => Url::to(['/default/file-upload']),
					'imageManagerJson' => Url::to(['/default/images-get']),
					'fileManagerJson' => Url::to(['/default/files-get']),
					'plugins' => [
						'imagemanager',
						'filemanager'
						
					],
				]
			]); ?>
			<?php
			highlight_string("
<?php
use vova07\imperavi\Widget;

echo Widget::widget([
    'name' => 'redactor',
    'settings' => [
        'lang' => 'en',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen'
        ]
    ]
]);
?>	
			");
			?>
		<?php
		Box::end();
		?>
		</div><!-- /.col (LEFT) -->
	</div>
<?php
Box::end();