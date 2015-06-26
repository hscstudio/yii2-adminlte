<?php
use yii\helpers\Html;
use hscstudio\adminlte\widgets\Box;
use hscstudio\adminlte\widgets\InfoBox;
use hscstudio\adminlte\widgets\SmallBox;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Widgets - Navigation';
$this->params['description'] = '~#!#~';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Box::begin([
	'header' => $this->title,
]);
?>
    <div class="row">
		<div class="col-md-12">
		<?php
		Box::begin([
			'header' => 'Navbar',
		]);
		?>
			<h4>Navbar AdminLTE Style!</h4>
			<p>See example in this app (top navigation).</p>
			<?php
			highlight_string("
<?php
use hscstudio\adminlte\widgets\NavBar;
use hscstudio\adminlte\widgets\Nav;
NavBar::begin([
	'brandLabel' => 'My Company',
	'brandUrl' => Yii::\$app->homeUrl,
	'options' => [
		'class' => 'navbar-static-top',
	],
]);
// START NAV WIDGET
\$menuItems = [
	['encode'=>false,'label' => '<i class=\"fa fa-home\"></i>', 'url' => ['/site/index']],
	// SUPPORT 4 TYPE => messages, notifications, tasks, users
	['type'=>'messages','label' => '#', 'url' => ['message/index'],'items'=> [
		['label' => 'Support Team', 'url' => ['/message/view','id'=>1], 
		'image'=> '/img/user2-160x160.jpg', 'description'=>'Why not buy a new awesome theme?', 'time'=>'5 mins'],
	]],				
	['type'=>'notifications','label' => '#', 'url' => ['/notifications/index'],'items'=>[
		['label' => 'Support Team', 'url' => ['/notifications/view','id'=>1], ],
		['label' => 'Support Team', 'url' => ['/notifications/view','id'=>2], ],
	]],
	['type'=>'tasks','label' => '#', 'url' => ['/tasks/index'],'items'=>[
		['label' => 'Migration', 'url' => ['/tasks/view','id'=>1], 'color'=>'aqua', 'percent'=>'10'],
		['label' => 'Backup', 'url' => ['/tasks/view','id'=>1], 'color'=>'red', 'percent'=>'75'],
	]],
	['label' => 'Page', 'url' => '#',
		'items'=>[
			['label' => 'Contact', 'url' => ['/site/contact']],
			['label' => 'About', 'url' => ['/site/about']],
		]
	],				
];
\$menuItems[] = [
	'type'=>'user',
	'label' => '#', 
	'url' => ['/tasks/index'],
	'logoutUrl' => ['/site/logout'],
	'profileUrl' => ['/site/profile'],
	'image'=> \$profile_photo,
	'username'=>Yii::\$app->user->identity->username,
	'position'=>'User',
	'join'=>'Member since '.date('m,Y',Yii::\$app->user->identity->created_at),
	'items'=>[]
];
echo Nav::widget([
	'options' => ['class' => 'navbar-nav'],
	'items' => \$menuItems,
]);
// END NAV WIDGET
NavBar::end();
?>
			");
			?>
		<?php
		Box::end();
		?>
		</div><!-- /.col (LEFT) -->
		<div class="col-md-12">
		<?php
		Box::begin([
			'header' => 'Navbar',
		]);
		?>
			<h4>SideNavBar & SideNav AdminLTE Style!</h4>
			<p>See example in this app (left navigation).</p>
			<?php
			highlight_string("
<?php
use hscstudio\adminlte\widgets\SideNavBar;
use hscstudio\adminlte\widgets\SideNav;
\$user = [];
if (!Yii::\$app->user->isGuest) {
	\$user['image']=	\$profile_photo ;
	\$user['username']=	Yii::\$app->user->identity->username;
}

SideNavBar::begin([
	'user' => \$user,
	'search' => [
		'method'=> 'post',
		'action'=> Url::to(['site/search']),
	],
	'options' => [
		'class' => 'navbar-static-top',
	],
]);

\$menuItems = [
	['label' => 'Dashboard', 'url' => '#', 'icon' => 'fa fa-dashboard'],
	
	['label' => 'Widgets', 'url' => '#', 'icon' => 'fa fa-th',
		'items'=>[
			['label' => 'Navigation', 'url' => ['site/widgets-navigation'], 'icon' => 'fa fa-compass'],
			['label' => 'Box', 'url' => ['site/widgets-box'], 'icon' => 'fa fa-square-o',],
			['label' => 'Chart', 'url' => ['site/widgets-chart'], 'icon' => 'fa fa-bar-chart-o','badge'=>'<span class=\"label label-danger pull-right\">Hot!</span>',],
			['label' => 'HighChart', 'url' => ['site/widgets-high-chart'], 'icon' => 'fa fa-pie-chart',],
			['label' => 'Imperavi', 'url' => ['site/widgets-imperavi'], 'icon' => 'fa fa-edit',],
			['label' => 'Bootstrap', 'url' => ['site/widgets-bootstrap'], 'icon' => 'fa fa-twitter',],
		],
	],
];
echo SideNav::widget([
	'header' => 'MAIN NAVIGATION',
	'options' => ['class' => 'sidebar-menu'],
	'items' => \$menuItems,
]);

SideNavBar::end();
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