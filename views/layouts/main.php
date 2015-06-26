<?php

use yii\helpers\Html;
use yii\helpers\Url;

use kartik\alert\AlertBlock;

# use required adminlte widget
use hscstudio\adminlte\widgets\Nav;
use hscstudio\adminlte\widgets\NavBar;
use hscstudio\adminlte\widgets\SideNavBar;
use hscstudio\adminlte\widgets\SideNav;
use hscstudio\adminlte\widgets\Breadcrumbs;
use hscstudio\adminlte\widgets\Alert;

# use required adminlte assets
use hscstudio\adminlte\assets\AdminLTEAsset;
use hscstudio\adminlte\assets\AdminLTEPluginsAsset;
$AdminLTEAsset = AdminLTEAsset::register($this);
$AdminLTEPluginsAsset = AdminLTEPluginsAsset::register($this);

$AdminLTEAsset = hscstudio\adminlte\assets\AdminLTEAsset::register($this);
$defaultPhoto = $AdminLTEAsset->baseUrl . '/img/user2-160x160.jpg';
if (!Yii::$app->user->isGuest) {
	$path = !empty(Yii::$app->params['uploaddir'])?Yii::$app->params['uploaddir']:Yii::getAlias("@app/files/"); 
	if(file_exists($path . 'users/'. Yii::$app->user->id . '.jpg')){
		$defaultPhoto = Url::to([
			'/site/download','file'=>'users/'.Yii::$app->user->id.'.jpg','preview'=>true
		]);
	}
}
/* @var $this \yii\web\View */
/* @var $content string */

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
	<!-- Site wrapper -->
    <div class="wrapper">
		
		<?php
			NavBar::begin([
				'brandLabel' => 'AdminLTE',
				'brandUrl' => Yii::$app->homeUrl,
				'options' => [
					'class' => 'navbar-static-top',
				],
			]);
			
			$messages = [];
			if (!Yii::$app->user->isGuest) {
				$messages = [
					['label' => 'Support Team', 'url' => '#', 'image'=> $defaultPhoto, 'description'=>'Why not buy a new awesome theme?', 'time'=>'5 mins'],
					['label' => 'Marketing Team', 'url' => '#', 'image'=> $defaultPhoto, 'description'=>'Why not buy a new awesome server?', 'time'=>'2 mins'],
				];
			}
			
			
			$menuItems = [
				/*
				['encode'=>false,'label' => '<i class="fa fa-home"></i>', 'url' => ['/site/index']],
				*/
				['type'=>'messages','label' => '#', 'url' => ['/mailbox'],'items'=> $messages],
				['type'=>'notifications','label' => '#', 'url' => ['/notifications/index'],'items'=>[
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>1], ],
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>3], ],
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>4], ],
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>2], ],
				]],
				['type'=>'tasks','label' => '#', 'url' => ['/tasks/index'],'items'=>[
					['label' => 'Migration', 'url' => ['/tasks/view','id'=>1], 'color'=>'aqua', 'percent'=>'10'],
					['label' => 'Backup', 'url' => ['/tasks/view','id'=>1], 'color'=>'red', 'percent'=>'75'],
					['label' => 'Analyze', 'url' => ['/tasks/view','id'=>1], 'color'=>'yellow', 'percent'=>'25'],
					['label' => 'Tutorial', 'url' => ['/tasks/view','id'=>1], 'color'=>'lime', 'percent'=>'50'],
				]],
				/*
				['label' => 'Page', 'url' => '#',
					'items'=>[
						['label' => 'Contact', 'url' => ['/site/contact']],
						['label' => 'About', 'url' => ['/site/about']],
					]
				],				
				*/
			];
			
			if (Yii::$app->user->isGuest) {
				$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
				$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
			} else {
				$profile_photo = $defaultPhoto;
				$menuItems[] = [
					'type'=>'user',
					'label' => '#', 
					'url' => ['/tasks/index'],
					'logoutUrl' => ['/site/logout'],
					'profileUrl' => ['/site/profile'],
					'image'=> $profile_photo,
					'username'=>Yii::$app->user->identity->username,
					'position'=>'User',
					'join'=>'Member since '.date('m,Y',Yii::$app->user->identity->created_at),
					'items'=>[]
				];
			}
			$menuItems[] = ['type'=>'control','label' => '#', 'url' => '#'];
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav'],
				'items' => $menuItems,
			]);
			NavBar::end();
		?>
        

      <!-- =============================================== -->
	
      <!-- Left side column. contains the sidebar -->
		<?php
		$user = [];
		if (!Yii::$app->user->isGuest) {
			$user['image']=	$profile_photo ;
			$user['username']=	Yii::$app->user->identity->username;
		}
		
		SideNavBar::begin([
			'user' => $user,
			'search' => [
				'method'=> 'post',
				'action'=> Url::to(['site/search']),
			],
			'options' => [
				'class' => 'navbar-static-top',
			],
		]);
		
		$menuItems = [
			['label' => 'Dashboard', 'url' => '#', 'icon' => 'fa fa-dashboard'],
			['label' => 'Page', 'url' => '#', 'icon' => 'fa fa-file',
				'items'=>[
					['label' => 'Contact', 'url' => ['/site/contact'], 'icon' => 'fa fa-angle-right'],
					['label' => 'About', 'url' => ['/site/about'], 'icon' => 'fa fa-angle-right'],
				]
			],				
			['label' => 'Widgets', 'url' => '#', 'icon' => 'fa fa-th',
				'items'=>[
					['label' => 'Navigation', 'url' => ['/site/widgets-navigation'], 'icon' => 'fa fa-compass'],
					['label' => 'Box', 'url' => ['/site/widgets-box'], 'icon' => 'fa fa-square-o',],
					['label' => 'Bootstrap', 'url' => ['/site/widgets-bootstrap'], 'icon' => 'fa fa-twitter',],
					/*
					['label' => 'Chart', 'url' => ['/site/widgets-chart'], 'icon' => 'fa fa-bar-chart-o','badge'=>'<span class="label label-danger pull-right">Hot!</span>',],
					['label' => 'HighChart', 'url' => ['/site/widgets-high-chart'], 'icon' => 'fa fa-pie-chart',],
					['label' => 'Imperavi', 'url' => ['/site/widgets-imperavi'], 'icon' => 'fa fa-edit',],
					*/
				],
			],
			['label' => 'Examples', 'url' => '#', 'icon' => 'fa fa-folder',
				'items'=>[
					['label' => 'Mailbox', 'url' => ['/mailbox'], 'icon' => 'fa fa-envelope'],
				],
			],
			['label' => 'Multilevel', 'url' => '#', 'icon' => 'fa fa-sitemap ',
				'items'=>[
					['label' => 'Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
					['label' => 'Level', 'url' => '#', 'icon' => 'fa fa-angle-right',
						'items'=>[
							['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
							['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right',
								'items'=>[
									['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
									['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
									['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
								]
							],
							['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
						]
					],
					['label' => 'Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
				]
			],
			['label' => 'Documentation', 'url' => '#', 'icon' => 'fa fa-book'],			
		];
		echo SideNav::widget([
			'header' => 'MAIN NAVIGATION',
			'options' => ['class' => 'sidebar-menu'],
			'items' => $menuItems,
		]);
		
		SideNavBar::end();
		?>
      
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<?php 
		if(isset($this->params['breadcrumbs'])){ ?>
        <section class="content-header">
			<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>
			<br>
        </section>
		<?php } ?>

        <!-- Main content -->
        <section class="content">
			<?= AlertBlock::widget([
				'type' => AlertBlock::TYPE_GROWL,
				'useSessionFlash' => true
			]) ?>
			<?= $content ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://www.hafidmukhlasin.com">Hafid Mukhlasin</a>.</strong> All rights reserved.
      </footer>
      
      <?php
	  include '_sidebar.php';
	  ?>
    </div><!-- ./wrapper -->
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
