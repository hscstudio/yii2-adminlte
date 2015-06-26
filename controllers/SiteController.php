<?php
namespace hscstudio\adminlte\controllers;

use Yii;

use hscstudio\adminlte\models\LoginForm;
use hscstudio\adminlte\models\PasswordResetRequestForm;
use hscstudio\adminlte\models\ResetPasswordForm;
use hscstudio\adminlte\models\SignupForm;
use hscstudio\adminlte\models\ContactForm;
use hscstudio\adminlte\models\User;

use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\imagine\Box;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
				'rules' => [
                    [
                        'actions' => [
							'login', 'error','signup',
							'request-password-reset',
							'reset-password','locak-screen',
						],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
		      
        return $this->render('index');
    }

    public function actionLogin()
    {		
		$this->layout = "blank";
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $this->layout = "blank";
		$model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
				$user->save();
                if (Yii::$app->getUser()->login($user)) {					
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $this->layout = "blank";
		$model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        $this->layout = "blank"; 
		try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
	
	public function actionLockScreen()
    {
        $this->layout = "blank";
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('lockScreen', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionWidgetsNavigation()
    {
        return $this->render('widgets/navigation');
    }
	
	public function actionWidgetsBox()
    {
        return $this->render('widgets/box');
    }
	
	public function actionWidgetsChart()
    {
        return $this->render('widgets/chart');
    }
	
	public function actionWidgetsHighChart()
    {
        return $this->render('widgets/highChart');
    }
	
	public function actionWidgetsImperavi()
    {
        return $this->render('widgets/imperavi');
    }
	
	public function actionWidgetsBootstrap()
    {
        return $this->render('widgets/bootstrap');
    }
	
	
	public function actionDownload($file='',$preview=false)
    {
        $path = !empty(Yii::$app->params['uploaddir'])?Yii::$app->params['uploaddir']:Yii::getAlias("@app/files/");
        // FILTER ACCESS PARENT FOLDER
        $file = str_replace("..","",$file);
        // CHECK ID FILE EXIST?
        if(file_exists($path . $file) and !empty($file)){
            $type = \yii\helpers\FileHelper::getMimeType($path . $file);
            $response = Yii::$app->getResponse();
            $response->sendFile($path . $file, $file ,['inline'=>$preview]);
        }
        else{
            Yii::$app->getSession()->setFlash('warning','File not found');
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionProfile()
    {

        $model = User::findOne(Yii::$app->user->identity->id);
        $model->scenario = "profile";
        if ($model->load(Yii::$app->request->post())) {
            if(!empty($model->password)){
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);                
            }
            if($model->save()){
				if (!empty($_FILES)) {
					// prepare path
					$path = !empty(Yii::$app->params['uploaddir'])?Yii::$app->params['uploaddir']:Yii::getAlias("@app/files/");
					$path = $path.'users/';			
					@mkdir($path, 0755, true);
					@chmod($path, 0755);
					$photo = UploadedFile::getInstanceByName('photo'); 
					if($photo){
						// NORMAL
						//$photo->saveAs($path . $model->id. '.jpg');
						
						// THUMBNAIL
						$thumbnail = Image::thumbnail($photo->tempName, 160, 160);
						$thumbnail->save($path . $model->id . '.jpg', ['quality' => 100]);
					} 
					Yii::$app->getSession()->setFlash('success', 'Your profile have updated!');
				}
				else{
					Yii::$app->getSession()->setFlash('success','Your profile have updated!');                
				}                
            }
            else{
                Yii::$app->getSession()->setFlash('warning','Terdapat error!');                   
            }
            return $this->refresh();
        } else {
            return $this->render('profile', [
                'model' => $model,
            ]);
        }
    }
}
