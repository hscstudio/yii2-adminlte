<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use kartik\alert\AlertBlock;

# use required adminlte widget
use hscstudio\adminlte\assets\AdminLTEAsset;
use hscstudio\adminlte\assets\AdminLTEPluginsAsset;

/* @var $this \yii\web\View */
/* @var $content string */

$AdminLTEAsset = AdminLTEAsset::register($this);
$AdminLTEPluginsAsset = AdminLTEPluginsAsset::register($this);
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
<body class="blank">
    <?php $this->beginBody() ?>
    <div class="wrap">
        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
		<?= AlertBlock::widget([
			'type' => AlertBlock::TYPE_GROWL,
			'useSessionFlash' => true
		]) ?>
        <?= $content ?>
        </div>
    </div>

    <?php $this->endBody() ?>
	<script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>
</html>
<?php $this->endPage() ?>
