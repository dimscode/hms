<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/gentelella/';
    public $baseUrl = '@web/gentelella/';
    public $css = [
        'vendors/bootstrap/dist/css/bootstrap.min.css',
        '../wizard/assets/css/gsdk-bootstrap-wizard.css',
        'vendors/font-awesome/css/font-awesome.min.css',
        'vendors/nprogress/nprogress.css',
        'vendors/iCheck/skins/flat/green.css',
        'vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
        'vendors/jqvmap/dist/jqvmap.min.css',
        'vendors/bootstrap-daterangepicker/daterangepicker.css',
        'build/css/custom.css',

    ];
    public $js = [
        'vendors/jquery/dist/jquery.min.js',
        'vendors/bootstrap/dist/js/bootstrap.min.js',
        'vendors/moment/moment.js',
        'vendors/bootstrap-daterangepicker/daterangepicker.js',
        'build/js/custom.js',
        '../wizard/assets/js/jquery.bootstrap.wizard.js',
        '../wizard/assets/js/gsdk-bootstrap-wizard.js',
        '../wizard/assets/js/jquery.validate.min.js',
    ];
    public $depends = [

    ];
}
