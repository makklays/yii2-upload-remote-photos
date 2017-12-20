<?php
namespace makklays\uploadRemotePhotos;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Application;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->setModule('uploadRemotePhotos', 'makklays\uploadRemotePhotos\Module');
    }
}
