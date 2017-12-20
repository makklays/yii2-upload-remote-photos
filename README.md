INSTALL / УСТАНОВКА
===================

<div>[en] Install with composer</div>
<div>[ru] Установка с composer</div>

<br/>
<div>
composer require makklays/yii2-uploadRemotePhotos
</div>

INFORMATION / ИНФОРМАЦИЯ
------------------------

<div>
[en] Upload photos (jpg, png, gif) from remote host and save it on system of file (your site) for the Yii2 framework
</div>
<div>
[ru] Загрузка фотографий (jpg, png, gif) с удаленного хоста и сохранение их на Файловой системе
</div>

USE / ИСПОЛЬЗОВАНИЕ
-------------------

<div>
use makklays\uploadRemotePhotos;
</div><br/>

<div>
$remoteUrl = 'http://your_site_name/dir_with_photos';
</div>
<div>
$pathDir   = Yii::$app->basePath . '/web/new_dir_with_photos';
</div><br/>

<div>
$up = new uploadRemotePhotos\uploadRemotePhotos('up');
</div>
<div>
$up->upload($remoteUrl, $pathDir);
</div>
<br/>
