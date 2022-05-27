<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-catalog">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Все товары, упорядоченные по новизне. Сортировка: год, название, цена. Фильтрация: категории.
    Товар: изображение, название, цена.</p>
</div>
