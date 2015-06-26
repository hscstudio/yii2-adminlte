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
class NavBar extends Widget
{
    /**
     * @var array the HTML attributes for the widget container tag. The following special options are recognized:
     *
     * - tag: string, defaults to "nav", the name of the container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /**
     * @var array the HTML attributes for the container tag. The following special options are recognized:
     *
     * - tag: string, defaults to "div", the name of the container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $containerOptions = [];
    /**
     * @var string|boolean the text of the brand of false if it's not used. Note that this is not HTML-encoded.
     * @see http://getbootstrap.com/components/#navbar
     */
    public $brandLabel = "App Name";
	public $brandShortLabel = "<i class='fa fa-th'></i>";
    /**
     * @param array|string|boolean $url the URL for the brand's hyperlink tag. This parameter will be processed by [[Url::to()]]
     * and will be used for the "href" attribute of the brand link. Default value is false that means
     * [[\yii\web\Application::homeUrl]] will be used.
     */
    public $brandUrl = false;
    /**
     * @var array the HTML attributes of the brand link.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $brandOptions = [];
    /**
     * @var string text to show for screen readers for the button to toggle the navbar.
     */
    public $screenReaderToggleText = 'Toggle navigation';
    /**
     * @var boolean whether the navbar content should be included in an inner div container which by default
     * adds left and right padding. Set this to false for a 100% width navbar.
     */
    public $renderInnerContainer = false;
    /**
     * @var array the HTML attributes of the inner container.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $innerContainerOptions = [];


    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        $this->clientOptions = false;
		echo Html::beginTag('header', ['class'=>'main-header']);
		Html::addCssClass($this->brandOptions, 'logo');
		echo Html::a(
			Html::tag('span',$this->brandShortLabel,['class'=>'logo-mini']).
			Html::tag('span',$this->brandLabel,['class'=>'logo-lg'])
			, $this->brandUrl === false ? Yii::$app->homeUrl : $this->brandUrl, $this->brandOptions);
		?>
		<?php
        Html::addCssClass($this->options, 'navbar');
        if ($this->options['class'] === 'navbar') {
            Html::addCssClass($this->options, 'navbar-default');
        }
        
        if (empty($this->options['role'])) {
            $this->options['role'] = 'navigation';
        }
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'nav');
        echo Html::beginTag($tag, $options);
		echo $this->renderToggleButton();
        if ($this->renderInnerContainer) {
            if (!isset($this->innerContainerOptions['class'])) {
                Html::addCssClass($this->innerContainerOptions, 'container');
            }
            echo Html::beginTag('div', $this->innerContainerOptions);
        }

        Html::addCssClass($this->containerOptions, 'navbar-custom-menu');
        $options = $this->containerOptions;
        $tag = ArrayHelper::remove($options, 'tag', 'div');
        echo Html::beginTag($tag, $options);
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        $tag = ArrayHelper::remove($this->containerOptions, 'tag', 'div');
        echo Html::endTag($tag);
        if ($this->renderInnerContainer) {
            echo Html::endTag('div');
        }
        $tag = ArrayHelper::remove($this->options, 'tag', 'nav');
        echo Html::endTag($tag, $this->options);
		echo Html::endTag('header');
		?>
		<?php
        BootstrapPluginAsset::register($this->getView());
    }

    /**
     * Renders collapsible toggle button.
     * @return string the rendering toggle button.
     */
    protected function renderToggleButton()
    {
		$bar = Html::tag('span', '', ['class' => 'icon-bar']);
        $screenReader = "<span class=\"sr-only\">{$this->screenReaderToggleText}</span>";

        return Html::a("{$screenReader}\n{$bar}\n{$bar}\n{$bar}", '#', [
            'class' => 'sidebar-toggle',
            'data-toggle' => 'offcanvas',
            'role'=>"button",
        ]);
    }
}
