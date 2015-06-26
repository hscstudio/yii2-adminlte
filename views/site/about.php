<?php
use yii\helpers\Html;
use hscstudio\adminlte\widgets\Box;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['description'] = '~#!#~';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
<?php
Box::begin([
    'header' => Html::encode($this->title),
    'toolboxs' => [
        'collapse',
        'remove',            
    ],
    'footer' => '',
    'variant' => 'default', // primary, success, info, warning, danger
    'solid' => false,
    'overlay' => false,
]);
?>
    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>
<?php
Box::end();
?>
</div>
