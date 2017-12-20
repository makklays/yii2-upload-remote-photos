<?php
namespace makklays\uploadRemotePhotos;

use Yii;
use yii\base\Module;
use yii\base\Exception;
use yii\base\ErrorException;

/**
 * Class uploadRemotePhotos
 *
 * Загружаем фото (jpg, png, gif) с удаленного хоста на файловую систему
 *
 * @package makklays\uploadRemotePhotos
 */
class uploadRemotePhotos extends Module
{
    public $remoteUrl = '';
    public $path = '';

    /**
     * Загружаем фото
     *
     * @param null $remoteUrl
     * @param null $path
     * @throws \Exception
     */
    public function upload($remoteUrl = null, $path = null)
    {
        // типа setter
        if (!is_null($remoteUrl)) {
            $this->remoteUrl = $remoteUrl;
        }

        // типа setter
        if (!is_null($path)) {
            $this->path = $path;
        }

        try {

            // получаем массив файлов с директории удаленного хоста
            $content = file_get_contents($this->remoteUrl);

            //preg_match_all('/<img[^>]+src="?\'?([^"\']+)"?\'?[^>]*>/i', $content, $files);
            preg_match_all('/<img[^>]*?src=\"(.*)\"/iU', $content, $files);

            if (isset($files[1]) && !empty($files[1])) {
                // перебираем все файлы из директории
                foreach ($files[1] as $file) {
                    // получаем инфо о файле (фото)
                    $info = pathinfo($file);

                    // обрезаем переменные (filename.png?w=10&h10) в url поле расширения файла
                    $pos = strpos($info['extension'],'?');
                    if (isset($pos) && !empty($pos)) {
                        $info['extension'] = substr($info['extension'], 0, $pos);
                    }

                    /*echo '<pre>';
                    print_r($info);
                    echo $this->path . '/' . $info['filename'] . '.' . $info['extension'];
                    echo '</pre>';*/

                    // копируем только файлы с расщирением jpg, png или gif
                    if (in_array($info['extension'], ['jpg', 'png', 'gif'])) {
                        copy($info['dirname'] . '/' . $info['filename'] . '.' . $info['extension'], $this->path . '/' . $info['filename'] . '.' . $info['extension']);
                    }
                }

                return true;
            } else {
                return false;
            }

        } catch (\Exception $ex) { // ловим исключения
            echo 'Исключение ' . $ex->getMessage();
            //throw new \Exception('Произошла исключительная ситуация');
        }
    }
}


