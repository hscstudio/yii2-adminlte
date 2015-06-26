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
class AdminLTEPluginsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/';
    public $css = [
        'plugins/iCheck/square/blue.css', // should break per plugins
    ];
    public $js = [
        'plugins/iCheck/icheck.min.js',
		'plugins/slimScroll/jquery.slimscroll.min.js',
		'plugins/fastclick/fastclick.min.js',
		//'plugins/chartjs/Chart.min.js',
    ];
    public $depends = [
        'hscstudio\adminlte\assets\AdminLTEAsset',
    ];
}
