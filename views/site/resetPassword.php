<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

$this->title = 'Reset password';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <div class="login-logo">
		<h1><?= Html::encode($this->title) ?></h1>
	</div><!-- /.login-logo -->
	
	<div class="login-box-body">
		<p class="login-box-msg">Please choose your new password:</p>
		<?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
		<?= $form->field($model, 'password', [
				'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span></div>',
				'inputOptions' => [
					'placeholder' => $model->getAttributeLabel('password'),
				],
			])->passwordInput()->label(false) ?>
		<div class="form-group">
			<?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-flat pull-right']) ?>
		</div>
		<?php ActiveForm::end(); ?>
		
		<div style="color:#999;margin:1em 0">
			<?= Html::a('&laquo; Back to home', ['site/index']) ?>.<br>
		</div>
    </div>
</div>
