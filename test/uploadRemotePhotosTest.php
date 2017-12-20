<?php
namespace makklays\Test;

require_once __DIR__ . '/../../../vendor/autoload.php';

use makklays\uploadRemotePhotos\uploadRemotePhotos;
use yii\helpers\Url;

/**
 * Class uploadRemotePhotosTest
 *
 * Тестируем клас uploadRemotePhotos
 *
 * @package makklays\Test
 */
class uploadRemotePhotosTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws \Exception
     */
    public function testUpload()
    {
        $up = new uploadRemotePhotos('urp');
        //$up->upload('', '');
        //$this->assertTrue(true);

        $this->assertEquals(false, $up->upload('', ''));
    }
}