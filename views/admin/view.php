<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<?php
if ($key == "urls") {
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'address',
                'value' => $model->address,            
                'contentOptions' => ['class' => 'bg-red'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ],
            [
                'label' => 'check_frequency',
                'value' => $model->check_frequency,            
                'contentOptions' => ['class' => 'bg-red'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ],
            [
                'label' => 'error_check',
                'value' => $model->error_check,            
                'contentOptions' => ['class' => 'bg-red'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ],
            [
                'label' => 'creation_date',
                'value' => $model->creation_date,            
                'contentOptions' => ['class' => 'bg-red'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ]
        ],
    ]);
}

if ($key == "checks") {
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'url',
                'value' => $model->url,            
                'contentOptions' => ['class' => 'bg-red'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ],
            [
                'label' => 'code',
                'value' => $model->code,            
                'contentOptions' => ['class' => 'bg-red'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ],
            [
                'label' => 'attempt',
                'value' => $model->attempt,            
                'contentOptions' => ['class' => 'bg-red'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ],
            [
                'label' => 'check_date',
                'value' => $model->check_date,            
                'contentOptions' => ['class' => 'bg-red'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
            ]
        ],
    ]);
}
?>