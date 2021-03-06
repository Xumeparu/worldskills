<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Оформление заказа', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute' => "userId", 'value' => 'user.login'],
            'timestamp',
            'status',
            'amount',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                'template' => '{confirm} {cancel}',
                'buttons' => [
                    'confirm' => function($url, $model) {
                        if ($model->status === 'Новый') {
                            return Html::a('Подтвердить', ['/order/confirm', 'id' => $model->id]);
                        }
                    },
                    'cancel' => function($url, $model) {
                        if ($model->status === 'Новый') {
                            return Html::a('Отменить', ['/order/cancel', 'id' => $model->id]);
                        }
                    },
                ]
            ],
        ],
    ]); ?>


</div>
