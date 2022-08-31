<?php
use yii\helpers\Html;
?>
<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>Адрес</label>: <?= Html::encode($model->address) ?></li>
    <li><label>Частота проверки</label>: <?= Html::encode($model->check_frequency) ?></li>
    <li><label>Проверки при ошибке</label>: <?= Html::encode($model->error_check) ?></li>
</ul>