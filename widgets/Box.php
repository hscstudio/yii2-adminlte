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
class Box extends Widget
{
    /**
     * @var array the HTML attributes for the widget container tag. The following special options are recognized:
     *
     * - tag: string, defaults to "nav", the name of the container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
	
	public $title = '';
	public $header = '';
	public $toolboxs = [];
	public $footer = '';
	public $variant = 'default';
	public $solid = false;
	public $overlay = false;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
		Html::addCssClass($containerOptions, 'box');
		if(!empty($this->variant)){
			Html::addCssClass($containerOptions, 'box-'.$this->variant);
		}
		if(!empty($this->solid)){
			Html::addCssClass($containerOptions, 'box-solid');
		}
		Html::addCssClass($headerOptions, 'box-header with-border');
		Html::addCssClass($bodyOptions, 'box-body');
		echo Html::beginTag('div', $containerOptions);
			if(!empty($this->header)){
				echo Html::beginTag('div', $headerOptions);
					echo Html::tag('h3',$this->header,['class'=>'box-title']);
					if(!empty($this->toolboxs)){
						echo Html::beginTag('div', ['class'=>'box-tools pull-right']);
						foreach($this->toolboxs as $toolbox){							
							if($toolbox == 'collapse'){
								echo '<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>';
							}
							else if($toolbox == 'remove'){
								echo '<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>';
							}
							else{
								echo $toolbox;
							}
						}
						echo Html::endTag('div');
					}
				echo Html::endTag('div');
			}
			
			if($this->overlay){
				echo Html::tag('div','<i class="fa fa-refresh fa-spin"></i>',['class'=>'overlay']);
			}
			echo Html::beginTag('div', $bodyOptions);	
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
		Html::addCssClass($footerOptions, 'box-footer');
			echo Html::endTag('div');
			if(!empty($this->footer)){
				echo Html::beginTag('div', $footerOptions);
				echo $this->footer;
				echo Html::endTag('div');
			}
		echo Html::endTag('div');	
        BootstrapPluginAsset::register($this->getView());
    }
}
