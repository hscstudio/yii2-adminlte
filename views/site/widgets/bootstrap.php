<?php
use yii\helpers\Html;
use hscstudio\adminlte\widgets\Box;
use hscstudio\adminlte\widgets\InfoBox;
use hscstudio\adminlte\widgets\SmallBox;
use yii\helpers\Url;
use hscstudio\adminlte\widgets\Tabs;
use yii\bootstrap\Carousel;
use yii\bootstrap\Collapse;

/* @var $this yii\web\View */
$this->title = 'Widgets - Bootstrap';
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
			'header' => 'Calout',
		]);
		?>
			<div class="callout callout-danger">
			<h4>I am a danger callout!</h4>
			<p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
			</div>
			<?php
			highlight_string("
<!-- We can use: danger, warning, success, primary, default  -->
<div class=\"callout callout-danger\">
	<h4>I am a danger callout!</h4>
	<p>There is a problem that we need to fix. A wonderful serenity 
	has taken possession of my entire soul, like these sweet mornings 
	of spring which I enjoy with my whole heart.</p>
</div>
			");
			?>
		<?php
		Box::end();
		?>
		</div><!-- /.col (LEFT) -->
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'Alert',
		]);
		?>
			<div class="alert alert-info">
			<h4>I am a info alert!</h4>
			<p>There is a problem that we need to fix. A wonderful serenity has taken 
			possession of my entire soul, like these sweet mornings of spring which 
			I enjoy with my whole heart.</p>
			</div>
			<?php
			highlight_string("
<!-- We can use: danger, warning, success, primary, default  -->
<div class=\"alert alert-info\">
	<h4>I am a info alert!</h4>
	<p>There is a problem that we need to fix. A wonderful serenity 
	has taken possession of my entire soul, like these sweet mornings 
	of spring which I enjoy with my whole heart.</p>
</div>
			");
			?>
		<?php
		Box::end();
		?>
		</div><!-- /.col (LEFT) -->
	</div>
	<div class="row">
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'AdminLTE Custom Tabs',
		]);
		?>
			<?php
			echo Tabs::widget([
				'items' => [
					[
						'label' => 'One',
						'content' => 'Anim pariatur cliche...',
						'active' => true
					],
					[
						'label' => 'Two',
						'content' => 'Anim pariatur cliche...',
						'options' => ['id' => 'myveryownID'],
					],
					[
						'label' => 'Dropdown',
						'items' => [
						   [
							   'label' => 'DropdownA',
							   'content' => 'DropdownA, Anim pariatur cliche...',
						   ],
						   [
							   'label' => 'DropdownB',
							   'content' => 'DropdownB, Anim pariatur cliche...',
						   ],
						],
					],
				],
			]);
			?>
			<?php
			highlight_string("
<?php
use hscstudio\adminlte\widgets\Tabs;
echo Tabs::widget([
	'items' => [
		[
			'label' => 'One',
			'content' => 'Anim pariatur cliche...',
			'active' => true
		],
		[
			'label' => 'Two',
			'content' => 'Anim pariatur cliche...',
			'options' => ['id' => 'myveryownID'],
		],
		[
			'label' => 'Dropdown',
			'items' => [
			   [
				   'label' => 'DropdownA',
				   'content' => 'DropdownA, Anim pariatur cliche...',
			   ],
			   [
				   'label' => 'DropdownB',
				   'content' => 'DropdownB, Anim pariatur cliche...',
			   ],
			],
		],
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
			'header' => 'AdminLTE Custom Tabs',
		]);
		?>
			<?php
			echo Tabs::widget([
				'navType' => 'nav-tabs pull-right',
				'items' => [
					[
						'label' => 'One',
						'content' => 'Anim pariatur cliche...',
						'active' => true
					],
					[
						'label' => 'Two',
						'content' => 'Anim pariatur cliche...',
						'options' => ['id' => 'myveryownID'],
					],
					[
						'label' => '<i class="fa fa-th"></i> Custom Tabs',
						'encode' => false,
						'url' => '#',
						'headerOptions' => [
							'class'=> 'pull-left header',
						],
					],
					[
						'label' => 'Dropdown',
						'items' => [
						   [
							   'label' => 'DropdownA',
							   'content' => 'DropdownA, Anim pariatur cliche...',
						   ],
						   [
							   'label' => 'DropdownB',
							   'content' => 'DropdownB, Anim pariatur cliche...',
						   ],
						],
					],
				],
			]);
			?>
			<?php
			highlight_string("
<?php
use hscstudio\adminlte\widgets\Tabs;
echo Tabs::widget([
	'navType' => 'nav-tabs pull-right',
	'items' => [
		[
			'label' => 'One',
			'content' => 'Anim pariatur cliche...',
			'active' => true
		],
		[
			'label' => 'Two',
			'content' => 'Anim pariatur cliche...',
			'options' => ['id' => 'myveryownID'],
		],
		[
			'label' => '<i class=\"fa fa-th\"></i> Custom Tabs',
			'encode' => false,
			'url' => '#',
			'headerOptions' => [
				'class'=> 'pull-left header',
			],
		],
		[
			'label' => 'Dropdown',
			'items' => [
			   [
				   'label' => 'DropdownA',
				   'content' => 'DropdownA, Anim pariatur cliche...',
			   ],
			   [
				   'label' => 'DropdownB',
				   'content' => 'DropdownB, Anim pariatur cliche...',
			   ],
			],
		],
	],
]);
?>
			");
			?>
		<?php
		Box::end();
		?>
		</div><!-- /.col (LEFT) -->
	</div>
	<div class="row">
		<div class="col-md-6">
		<?php
		Box::begin([
			'header' => 'Yii 2.0 Carousel',
		]);
		?>
			<?php
			use hscstudio\adminlte\assets\AdminLTEAsset;
			$AdminLTEAsset = AdminLTEAsset::register($this);
			echo Carousel::widget([
				'options' => [
					'class' => 'slide'
				],
				'controls' => [
					'<span class="fa fa-angle-left"></span>',
					'<span class="fa fa-angle-right"></span>',
				],
				'items' => [
					'<img src="'.$AdminLTEAsset->baseUrl.'/img/photo1.png"/>',
					[
						'content' => '<img src="'.$AdminLTEAsset->baseUrl.'/img/photo2.png"/>',
					],
					[
						'content' => '<img src="'.$AdminLTEAsset->baseUrl.'/img/photo1.png"/>',
						'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
					],
				],
			]);
			?>
			<?php
			highlight_string("
<?php
use yii\bootstrap\Carousel;
echo Carousel::widget([
	'options' => [
		'class' => 'slide'
	],
	'controls' => [
		'<span class=\"fa fa-angle-left\"></span>',
		'<span class=\"fa fa-angle-right\"></span>',
	],
	'items' => [
		// the item contains only the image
		'<img src=\"img/photo1.png\"/>',
		// equivalent to the above
		[
			'content' => '<img src=\"img/photo2.png\"/>',
		],
		// the item contains both the image and the caption
		[
			'content' => '<img src=\"img/photo1.png\"/>',
			'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
			//'options' => [...],
		],
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
			'header' => 'Yii 2.0 Collapse',
		]);
		?>
			<?php
			  echo Collapse::widget([
				  'items' => [
					  // equivalent to the above
					  [
						  'label' => 'Collapsible Group Item #1',
						  'content' => 'Anim pariatur cliche...',
						  // open its content by default
						  'contentOptions' => ['class' => 'in']
					  ],
					  // another group item
					  [
						  'label' => 'Collapsible Group Item #1',
						  'content' => 'Anim pariatur cliche...',
						  //'contentOptions' => [...],
						  //'options' => [...],
					  ],
					  // if you want to swap out .panel-body with .list-group, you may use the following
					  [
						  'label' => 'Collapsible Group Item #1',
						  'content' => [
							  'Anim pariatur cliche...',
							  'Anim pariatur cliche...'
						  ],
						  //'contentOptions' => [...],
						  //'options' => [...],
						  'footer' => 'Footer' // the footer label in list-group
					  ],
				  ]
			  ]);
			?>
			<?php
			highlight_string("
<?php
use yii\bootstrap\Collapse;
echo Collapse::widget([
	  'items' => [
		  // equivalent to the above
		  [
			  'label' => 'Collapsible Group Item #1',
			  'content' => 'Anim pariatur cliche...',
			  // open its content by default
			  'contentOptions' => ['class' => 'in']
		  ],
		  // another group item
		  [
			  'label' => 'Collapsible Group Item #1',
			  'content' => 'Anim pariatur cliche...',
			  //'contentOptions' => [...],
			  //'options' => [...],
		  ],
		  // if you want to swap out .panel-body with .list-group, you may use the following
		  [
			  'label' => 'Collapsible Group Item #1',
			  'content' => [
				  'Anim pariatur cliche...',
				  'Anim pariatur cliche...'
			  ],
			  //'contentOptions' => [...],
			  //'options' => [...],
			  'footer' => 'Footer' // the footer label in list-group
		  ],
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