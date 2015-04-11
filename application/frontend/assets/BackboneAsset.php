<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BackboneAsset extends AssetBundle
{
    public $js = [
        '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.2/underscore-min.js',
        '//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js',
        '//cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/1.2.0/jquery.serializeJSON.min.js',
    ];
    public $jsOptions = ['position' => View::POS_HEAD];
    public $depends = [
        'frontend\assets\AppAsset',
        'yii\web\JqueryAsset',
    ];
}
