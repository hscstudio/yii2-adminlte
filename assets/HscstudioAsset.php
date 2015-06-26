<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace hscstudio\adminlte\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HscstudioAsset extends AssetBundle
{
    public $sourcePath = '@hscstudio/adminlte/assets/';
    public $css = [
        'css/site.css', // should break per plugins
    ];
    public $js = [
        
    ];
    public $depends = [
        'hscstudio\adminlte\assets\AdminLTEAsset',
    ];
}
