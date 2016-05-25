<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--    <p>-->
    <!--        --><? //= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    <!--    </p>-->
    <?php
    $gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'id',
    'name',
    'category.name',
    'price',
    ['class' => 'yii\grid\ActionColumn'],
    ];

    // Renders a export dropdown menu
    echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
    ]);
?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,//search disabled
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'category_id',
                'value' => 'category.name',
            ],
            //  'category_id',
            'price',

            ['class' => 'yii\grid\ActionColumn'],//CRUD buttons disabled
        ],
    ]); ?>
</div>
