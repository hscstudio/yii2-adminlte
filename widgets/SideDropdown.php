<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace hscstudio\adminlte\widgets;

use yii\bootstrap\Widget;
use yii\bootstrap\BootstrapPluginAsset;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Dropdown renders a Bootstrap dropdown menu component.
 *
 * For example,
 *
 * ```php
 * <div class="dropdown">
 *     <a href="#" data-toggle="dropdown" class="dropdown-toggle">Label <b class="caret"></b></a>
 *     <?php
 *         echo Dropdown::widget([
 *             'items' => [
 *                 ['label' => 'DropdownA', 'url' => '/'],
 *                 ['label' => 'DropdownB', 'url' => '#'],
 *             ],
 *         ]);
 *     ?>
 * </div>
 * ```
 * @see http://getbootstrap.com/javascript/#dropdowns
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @since 2.0
 */
class SideDropdown extends Widget
{
    /**
     * @var array list of menu items in the dropdown. Each array element can be either an HTML string,
     * or an array representing a single menu with the following structure:
     *
     * - label: string, required, the label of the item link
     * - url: string|array, optional, the url of the item link. This will be processed by [[Url::to()]].
     *   If not set, the item will be treated as a menu header when the item has no sub-menu.
     * - visible: boolean, optional, whether this menu item is visible. Defaults to true.
     * - linkOptions: array, optional, the HTML attributes of the item link.
     * - options: array, optional, the HTML attributes of the item.
     * - items: array, optional, the submenu items. The structure is the same as this property.
     *   Note that Bootstrap doesn't support dropdown submenu. You have to add your own CSS styles to support it.
     *
     * To insert divider use `<li role="presentation" class="divider"></li>`.
     */
    public $items = [];
	
    public $parentItem = [];
    /**
     * @var boolean whether the labels for header items should be HTML-encoded.
     */
    public $encodeLabels = true;
    
    public $activateItems = true;
    public $activateParents = true;
    public $route;
    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'treeview-menu');
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        BootstrapPluginAsset::register($this->getView());
        $this->registerClientEvents();
        return $this->renderItems($this->items, $this->options);
    }

    /**
     * Renders menu items.
     * @param array $items the menu items to be rendered
     * @param array $options the container HTML attributes
     * @return string the rendering result.
     * @throws InvalidConfigException if the label option is not specified in one of the items.
     */
    protected function renderItems($items, $options = [])
    {
        $lines = [];	
        foreach ($items as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                    continue;
            }
            if (is_string($item)) {
                    $lines[] = $item;
                    continue;
            }
            if (!array_key_exists('label', $item)) {
                    throw new InvalidConfigException("The 'label' option is required.");
            }
            $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
            $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
            if (!empty($item['badge'])) {
                    $label .= $item['badge'];
            }
            $icon = isset($item['icon']) ? Html::tag('i','',['class'=> $item['icon'] ]) : '';
            $label = $icon . $label ;			
            $itemOptions = ArrayHelper::getValue($item, 'options', []);
            if (isset($item['active']) and $item['active']) {
                Html::addCssClass($itemOptions, 'active');
            }
            $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
            $linkOptions['tabindex'] = '-1';
            $url = array_key_exists('url', $item) ? $item['url'] : null;
            if (empty($item['items'])) {
                if ($url === null) {
                    $content = $label;
                    Html::addCssClass($itemOptions, 'dropdown-header');
                } else {
                    $content = Html::a($label, $url, $linkOptions);
                }
            } else {
                $submenuOptions = $options;
                unset($submenuOptions['id']);
                $label = $label . ' ' . Html::tag('i', '', ['class' => 'fa fa-angle-left pull-right']);
                $content = Html::a($label, $url === null ? '#' : $url, $linkOptions)
                        . $this->renderItems($item['items'], $submenuOptions);
                //$active = false;
                //$items = $this->isChildActive($item['items'], $active);
                //if($active){
                    //Html::addCssClass($itemOptions, 'active');
                //}
                Html::addCssClass($itemOptions, 'dropdown-submenu');
            }

            $lines[] = Html::tag('li', $content, $itemOptions);
        }			

        return Html::tag('ul', implode("\n", $lines), $options);
    }
    
    protected function isChildActive($items, &$active)
    {
        foreach ($items as $i => $child) {
            if (ArrayHelper::remove($items[$i], 'active', false) || $this->isItemActive($child)) {
                Html::addCssClass($items[$i]['options'], 'active');
                if ($this->activateParents) {
                    $active = true;
                }
            }
        }
        return $items;
    }
    
    protected function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];
            if ($route[0] !== '/' && Yii::$app->controller) {
                $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            if (ltrim($route, '/') !== $this->route) {
                return false;
            }
            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                $params = $item['url'];
                unset($params[0]);
                foreach ($params as $name => $value) {
                    if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
                        return false;
                    }
                }
            }

            return true;
        }

        return false;
    }
}
