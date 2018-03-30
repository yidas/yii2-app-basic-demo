<?php

namespace app\assets;

use Yii;

/**
 * Auto View Asset
 * 
 * @author  Nick Tsai <mtintaer@gmail.com>
 * @version 1.0.0
 * @example
 *  Set $basePath = '@webroot/dist/app' for JS asset reference:
 *  @app/views/site/index.php => @webroot/dist/app/site/index.js
 *  @app/views/level/site/about.php => @webroot/dist/app/level/site/about.js
 */
class AutoAssetBundle extends \yidas\web\AutoAssetBundle
{
    /**
     * Asset base setting
     *
     * @var string Path with default related path `dist/app`
     */
    public $basePath = '@webroot/dist/app';
    public $baseUrl = '@web/dist/app';
    
    public $depends = [
        'app\assets\AppAsset',
    ];
}
