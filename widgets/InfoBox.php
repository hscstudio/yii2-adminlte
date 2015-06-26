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
class InfoBox extends Widget
{
    /**
     * @var array the HTML attributes for the widget container tag. The following special options are recognized:
     *
     * - tag: string, defaults to "nav", the name of the container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
	
    public $color = 'red';
    public $type = 1;
    public $icon = 'fa fa-thumbs-o-up';
    public $text = 'Likes';
    public $number = '99';
    public $progress = '';
    public $progress_description = '';


    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
		Html::addCssClass($containerOptions, 'info-box');
		Html::addCssClass($options, 'info-box-icon');
		if($this->type==1){
			Html::addCssClass($options, 'bg-' . $this->color);
		}
		else{
			Html::addCssClass($containerOptions, 'bg-' . $this->color);
		}
		echo Html::beginTag('div', $containerOptions);
		echo Html::tag('span','<i class="'.$this->icon.'"></i>',$options);
		echo Html::beginTag('div', ['class'=>'info-box-content']);
		echo Html::tag('span',$this->text,['class'=>'info-box-text']);
		echo Html::tag('span',$this->number,['class'=>'info-box-number']);
		if(!empty($this->progress)){
			echo Html::beginTag('div', ['class'=>'progress']);
			echo Html::tag('div','',['class'=>'progress-bar','style'=>'width: '.$this->progress]);
			echo Html::endTag('div');
			echo Html::tag('span',$this->progress . ' ' . $this->progress_description,['class'=>'progress-description']);
		}
		echo Html::endTag('div');
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
