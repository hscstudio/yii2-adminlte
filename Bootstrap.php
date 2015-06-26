<?php
namespace hscstudio\adminlte;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Description of Bootstrap
 *
 * @author Hafid Mukhlasin
 */
class Bootstrap implements \yii\base\BootstrapInterface
{	
    public $example = true;
	
    public function init()
    {
        parent::init();
    }

    /**
     * 
     * @param \yii\web\Application $app
     */
    public function bootstrap($app)
    {	
	if(isset($app->components['adminlte']['example']) 
             and $app->components['adminlte']['example'])
        {
            $app->controllerMap['site'] = [
                    'class'=> 'hscstudio\adminlte\controllers\SiteController',
            ];
			
            $view = $app->getView();
            $pathMap=[];		
            $pathMap['@app/views/layouts'] = '@hscstudio/adminlte/views/layouts';		
            $pathMap['@app/views/site'] = '@hscstudio/adminlte/views/site';		
            if (!empty($pathMap)) {
                $view->theme = Yii::createObject([
                    'class' => 'yii\base\Theme',
                    'pathMap' => $pathMap
                ]);
            }
        }
    }
}
