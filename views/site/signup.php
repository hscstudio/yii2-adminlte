<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
//$this->context->layout = "blank";
$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-box">
    <div class="register-logo">
		<h1><?= Html::encode($this->title) ?></h1>
	</div><!-- /.login-logo -->
	
	<div class="register-box-body">
    <p class="login-box-msg">Please fill out the following fields to signup:</p>
	<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
		<?= $form->field($model, 'username', [
			'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span></div>',
			'inputOptions' => [
				'placeholder' => $model->getAttributeLabel('username'),
			],
		])->label(false) ?>
		<?= $form->field($model, 'email', [
			'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span></div>',
			'inputOptions' => [
				'placeholder' => $model->getAttributeLabel('email'),
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
				<div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div>
			</div><!-- /.col -->
			<div class="col-xs-4">
			  <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-flat pull-right', 'name' => 'signup-button','disabled'=>'disabled']) ?>
			</div><!-- /.col -->
		</div>
	<?php ActiveForm::end(); ?>	
	
	<div class="social-auth-links text-center">
	  <p>- OR -</p>
	  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
	  <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
	</div><!-- /.social-auth-links -->

	<div style="color:#999;margin:1em 0">
		<?= Html::a('I already have a membership', ['site/login']) ?>.<br>
		<?= Html::a('&laquo; Back to home', ['site/index']) ?>.<br>
	</div>
	
	</div>
</div>
<?php
$this->registerJs("
	$('input:checkbox').on('ifToggled', function() {
	  $('button[type=\"submit\"]').attr('disabled','disabled');
	  if(this.checked) $('button[type=\"submit\"]').removeAttr('disabled');
	});
");
?>
