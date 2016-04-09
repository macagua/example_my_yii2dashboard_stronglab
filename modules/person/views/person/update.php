<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\person\models\Person */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Person',
]) . $model->document_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->document_id, 'url' => ['view', 'id' => $model->document_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="person-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
