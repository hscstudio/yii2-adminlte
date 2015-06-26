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
class SmallBox extends Widget
{
    /**
     * @var array the HTML attributes for the widget container tag. The following special options are recognized:
     *
     * - tag: string, defaults to "nav", the name of the container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
	
    public $color = 'aqua';
    public $title = '150';
    public $description = 'New Orders';
    public $icon = 'fa fa-shopping-cart';
    public $url = '#';
    public $more = 'More info <i class="fa fa-arrow-circle-right"></i>';

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
		Html::addCssClass($containerOptions, 'small-box');
		if(!empty($this->color)){
			Html::addCssClass($containerOptions, 'bg-' . $this->color);
		}
		echo Html::beginTag('div', $containerOptions);
			echo Html::beginTag('div', ['class'=>'inner']);
				echo Html::tag('h3',$this->title);
				echo Html::tag('p',$this->description);
			echo Html::endTag('div');		
			echo Html::tag('div','<i class="'.$this->icon.'"></i>',['class'=>'icon']);
			echo Html::beginTag('a',['class'=>'small-box-footer','href'=>$this->url]);
				echo $this->more;
			echo Html::endTag('a');				
		echo Html::endTag('div');
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        BootstrapPluginAsset::register($this->getView());
    }
}
