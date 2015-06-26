<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */
//$this->context->layout = "blank";
$this->title = 'Request password reset';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
     <div class="login-logo">
		<h1><?= Html::encode($this->title) ?></h1>
	</div><!-- /.login-logo -->
	
	<div class="login-box-body">
    <p class="login-box-msg">Please fill out your email. A link to reset password will be sent there.</p>
	<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
	<?= $form->field($model, 'email', [
		'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span></div>',
		'inputOptions' => [
			'placeholder' => $model->getAttributeLabel('email'),
		],
	])->label(false) ?>
	<div class="form-group">
		<?= Html::submitButton('Send', ['class' => 'btn btn-primary btn-flat pull-right']) ?>
	</div>
	<?php ActiveForm::end(); ?>
	
	<div style="color:#999;margin:1em 0">
		<?= Html::a('&laquo; Back to home', ['site/index']) ?>.<br>
	</div>
    </div>
</div>
