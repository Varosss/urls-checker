<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Urls;
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }

    .help-block {
        color: red;
    }
</style>
<?php $form = ActiveForm::begin(); ?>
    <h3>Введите данные для url</h3>

    <?= $form->field($model, 'address')->label("Url адрес") ?><br>

    <?php 
        /* @var $this yii\web\View */
        /* @var $form yii\widgets\ActiveForm */
        /* @var $model app\models\Product */

        echo $form->field($model, 'check_frequency')->dropdownList(
            [1 => 1, 5 => 5, 10 => 10],
            ['prompt'=>'Не выбрано']
        )->label("Частота проверки");
    ?><br>

    <?php 
        /* @var $this yii\web\View */
        /* @var $form yii\widgets\ActiveForm */
        /* @var $model app\models\Product */

        echo $form->field($model, 'error_check')->dropdownList(
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            ['prompt'=>'Не выбрано']
        )->label("Количество проверок при ошибке");
    ?><br>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>