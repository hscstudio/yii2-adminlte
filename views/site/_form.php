<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
			'options'=>['enctype'=>'multipart/form-data'],
	]); ?>

    <div class="row">
    	<div class="col-md-4">
			<?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>    		
			<?= $form->field($model, 'password')->passwordInput() ?>
			<?= $form->field($model, 'password_repeat')->passwordInput() ?>
			<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
    	</div>
    	<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">

				</div>
			</div>	
    		<div class="row">
    			<div class="col-md-6">  
				<div>
					<?php
					$path = !empty(Yii::$app->params['uploaddir'])?Yii::$app->params['uploaddir']:Yii::getAlias("@app/files/"); 
					if(file_exists($path . 'users/'. $model->id . '.jpg')){
						echo Html::img(Url::to(['site/download','file'=>'users/'.$model->id.'.jpg','preview'=>true]),
							['class'=>'img-rounded',]
						);
					}
					else{
						$AdminLTEAsset = hscstudio\adminlte\assets\AdminLTEAsset::register($this);
						$defaultPhoto = $AdminLTEAsset->baseUrl . '/img/user2-160x160.jpg';
						echo Html::img($defaultPhoto,['class'=>'img-rounded']);
					}
					?>
					<hr>
				</div>
				<label class="control-label" for="user-gender">Photo</label>	
			    <?php
				echo \kartik\widgets\FileInput::widget([
					'name' => 'photo',
					'options' => ['accept' => 'image/*'],				
					'pluginOptions' => [
						'previewFileType' => 'image',
						'uploadLabel' => 'Upload',
						'showUpload' => false,
						
					]
				]);
				?>	
				</div> 
			</div>	
			
    	</div>
    </div>
    <div class="row">
    	
    </div>	
    

    
	
	
	
    
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
