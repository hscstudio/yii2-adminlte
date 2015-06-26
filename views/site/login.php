<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

//$this->context->layout = "blank";
$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
	<div class="login-logo">
		<h1><?= Html::encode($this->title) ?></h1>
	</div><!-- /.login-logo -->
	
	<div class="login-box-body">
        <p class="login-box-msg">Please fill out the following fields to login:</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
			<?= $form->field($model, 'username', [
				'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span></div>',
				'inputOptions' => [
					'placeholder' => $model->getAttributeLabel('username'),
				],
			])->label(false) ?>
			<?= $form->field($model, 'password', [
				'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span></div>',
				'inputOptions' => [
					'placeholder' => $model->getAttributeLabel('password'),
				],
			])->passwordInput()->label(false) ?>
			
          <div class="row">
            <div class="col-xs-8"> 				
              <?= $form->field($model, 'rememberMe')->checkbox(['class'=>'pull-left']) ?>                      
            </div><!-- /.col -->
            <div class="col-xs-4">
              <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-flat pull-right', 'name' => 'login-button']) ?>
            </div><!-- /.col -->
          </div>
        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <div style="color:#999;margin:1em 0">
			If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.<br>
			<?= Html::a('Register a new membership', ['site/signup']) ?>.<br>
			<?= Html::a('&laquo; Back to home', ['site/index']) ?>.<br>
		</div>
      </div><!-- /.login-box-body -->
</div>