<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace hscstudio\adminlte\widgets;

use Yii;
use yii\bootstrap\Widget;
use yii\bootstrap\BootstrapPluginAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * NavBar renders a navbar HTML component.
 *
 * Any content enclosed between the [[begin()]] and [[end()]] calls of NavBar
 * is treated as the content of the navbar. You may use widgets such as [[Nav]]
 * or [[\yii\widgets\Menu]] to build up such content. For example,
 *
 * ```php
 * use yii\bootstrap\NavBar;
 * use yii\widgets\Menu;
 *
 * NavBar::begin(['brandLabel' => 'NavBar Test']);
 * echo Nav::widget([
 *     'items' => [
 *         ['label' => 'Home', 'url' => ['/site/index']],
 *         ['label' => 'About', 'url' => ['/site/about']],
 *     ],
 * ]);
 * NavBar::end();
 * ```
 *
 * @see http://getbootstrap.com/components/#navbar
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @author Alexander Kochetov <creocoder@gmail.com>
 * @since 2.0
 */
class SideNavBar extends Widget
{
    /**
     * @var array the HTML attributes for the widget container tag. The following special options are recognized:
     *
     * - tag: string, defaults to "nav", the name of the container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    public $user = [];
    public $search = [];


    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
		echo Html::beginTag('div', ['class'=>'main-sidebar']);
		echo Html::beginTag('div', ['class'=>'sidebar']);
		
		if (isset($this->user) and count($this->user)>0) {
			$image = isset($this->user['image'])?$this->user['image']:'';
			$username = isset($this->user['username'])?$this->user['username']:'';
			echo Html::beginTag('div', ['class'=>'user-panel']);
				echo Html::beginTag('div', ['class'=>'pull-left image']);
					echo '<img src="'.$image.'" class="img-circle" alt="user" />';
				echo Html::endTag('div');
				echo Html::beginTag('div', ['class'=>'pull-left info']);
					echo Html::tag('p',$username);
					echo Html::tag('a','<i class="fa fa-circle text-success"></i> Online');
				echo Html::endTag('div');				
			echo Html::endTag('div');
		}
		
		if (isset($this->search) and count($this->search)>0) {
			$method = isset($this->search['method'])?$this->search['method']:'get';
			$action = isset($this->search['action'])?$this->search['action']:'';
			echo Html::beginTag('form', ['method'=>$method,'action'=>$action,'class'=>'sidebar-form']);
				echo Html::beginTag('div', ['class'=>'input-group']);
				echo Html::input('text','q','',['class'=>'form-control','placeholder'=>'Search...']);
				echo Html::beginTag('span', ['class'=>'input-group-btn']);
					echo Html::submitButton(Html::tag('i','',['class'=>'fa fa-search']),[
						'id'=>'search-btn', 'class'=>"btn btn-flat"
					]);
				echo Html::endTag('span');
				echo Html::endTag('div');								
			echo Html::endTag('form');
		}
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::endTag('div');
		echo Html::endTag('div');
        BootstrapPluginAsset::register($this->getView());
    }
}
