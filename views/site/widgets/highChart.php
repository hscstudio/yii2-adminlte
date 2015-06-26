<?php
use yii\helpers\Html;
use hscstudio\adminlte\widgets\Box;
use hscstudio\adminlte\widgets\InfoBox;
use hscstudio\adminlte\widgets\SmallBox;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Widgets - HighChart';
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
			'header' => 'HighChart',
		]);
		?>
			<?= Highcharts::widget([
			   'options' => [
				  'title' => ['text' => 'Fruit Consumption'],
				  'xAxis' => [
					 'categories' => ['Apples', 'Bananas', 'Oranges']
				  ],
				  'yAxis' => [
					 'title' => ['text' => 'Fruit eaten']
				  ],
				  'series' => [
					 ['name' => 'Jane', 'data' => [1, 0, 4]],
					 ['name' => 'John', 'data' => [5, 7, 3]]
				  ]
			   ]
			]); ?>
			<?php
			highlight_string("
<?php
use miloschuman\highcharts\Highcharts;

echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Fruit Consumption'],
      'xAxis' => [
         'categories' => ['Apples', 'Bananas', 'Oranges']
      ],
      'yAxis' => [
         'title' => ['text' => 'Fruit eaten']
      ],
      'series' => [
         ['name' => 'Jane', 'data' => [1, 0, 4]],
         ['name' => 'John', 'data' => [5, 7, 3]]
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
			'header' => 'HighChart',
		]);
		?>
			<?= Highcharts::widget([
				'scripts' => [
					'modules/exporting',
					'themes/grid-light',
				],
				'options' => [
					'title' => [
						'text' => 'Combination chart',
					],
					'xAxis' => [
						'categories' => ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums'],
					],
					'labels' => [
						'items' => [
							[
								'html' => 'Total fruit consumption',
								'style' => [
									'left' => '50px',
									'top' => '18px',
									'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
								],
							],
						],
					],
					'series' => [
						[
							'type' => 'column',
							'name' => 'Jane',
							'data' => [3, 2, 1, 3, 4],
						],
						[
							'type' => 'column',
							'name' => 'John',
							'data' => [2, 3, 5, 7, 6],
						],
						[
							'type' => 'column',
							'name' => 'Joe',
							'data' => [4, 3, 3, 9, 0],
						],
						[
							'type' => 'spline',
							'name' => 'Average',
							'data' => [3, 2.67, 3, 6.33, 3.33],
							'marker' => [
								'lineWidth' => 2,
								'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
								'fillColor' => 'white',
							],
						],
						[
							'type' => 'pie',
							'name' => 'Total consumption',
							'data' => [
								[
									'name' => 'Jane',
									'y' => 13,
									'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
								],
								[
									'name' => 'John',
									'y' => 23,
									'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
								],
								[
									'name' => 'Joe',
									'y' => 19,
									'color' => new JsExpression('Highcharts.getOptions().colors[2]'), // Joe's color
								],
							],
							'center' => [100, 80],
							'size' => 100,
							'showInLegend' => false,
							'dataLabels' => [
								'enabled' => false,
							],
						],
					],
				]
			]); ?>
			<?php
			highlight_string("
<?php
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

echo Highcharts::widget([
	'scripts' => [
		'modules/exporting',
		'themes/grid-light',
	],
	'options' => [
		'title' => [
			'text' => 'Combination chart',
		],
		'xAxis' => [
			'categories' => ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums'],
		],
		'labels' => [
			'items' => [
				[
					'html' => 'Total fruit consumption',
					'style' => [
						'left' => '50px',
						'top' => '18px',
						'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || \"black\"'),
					],
				],
			],
		],
		'series' => [
			[
				'type' => 'column',
				'name' => 'Jane',
				'data' => [3, 2, 1, 3, 4],
			],
			[
				'type' => 'column',
				'name' => 'John',
				'data' => [2, 3, 5, 7, 6],
			],
			[
				'type' => 'column',
				'name' => 'Joe',
				'data' => [4, 3, 3, 9, 0],
			],
			[
				'type' => 'spline',
				'name' => 'Average',
				'data' => [3, 2.67, 3, 6.33, 3.33],
				'marker' => [
					'lineWidth' => 2,
					'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
					'fillColor' => 'white',
				],
			],
			[
				'type' => 'pie',
				'name' => 'Total consumption',
				'data' => [
					[
						'name' => 'Jane',
						'y' => 13,
						'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
					],
					[
						'name' => 'John',
						'y' => 23,
						'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
					],
					[
						'name' => 'Joe',
						'y' => 19,
						'color' => new JsExpression('Highcharts.getOptions().colors[2]'), // Joe's color
					],
				],
				'center' => [100, 80],
				'size' => 100,
				'showInLegend' => false,
				'dataLabels' => [
					'enabled' => false,
				],
			],
		],
	]
]);
?>	
			");
			?>
		<?php
		Box::end();
		?>
		</div>
	</div>
<?php
Box::end();