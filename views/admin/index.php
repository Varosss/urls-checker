<meta http-equiv="Refresh" content="20" />

<?php use yii\helpers\Html; ?>

<h3>Панель администратора</h3>

<br>

<h4>Список url</h4>
<?php foreach ($urls as $url): ?>
    <a href="/admin/view?key=urls&id=<?= $url->id ?>">
        <b><?= Html::encode($url->id) ?>. </b>
        <?= Html::encode($url->address) ?><br>
    </a>
<?php endforeach; ?>

<br>

<h4>Список проверок</h4>
<?php $checks = array_reverse($checks) ?>
<?php foreach ($checks as $check): ?>
    <?php
        if ($check->code == 0) {
            $color = "#fc0000";
        }
        elseif ($check->code < 300) {
            $color = "#16db3a";
        } elseif ($check->code < 400) {
            $color = "#0033ff";
        } else {
            $color = "#fc0000";
        }
    ?>

    <a style="color: <?= $color ?>;"href="/admin/view?key=checks&id=<?= $check->id ?>">
        <b><?= Html::encode($check->id) ?>. </b>
        HTTP-Response: <?= Html::encode($check->code) ?> - 
        <?= Html::encode($check->url) ?><br>
    </a>
<?php endforeach; ?>