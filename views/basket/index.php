<?php
/*
 * Страница корзины покупателя, файл views/basket/index.php
 */

use yii\helpers\Html;
use yii\helpers\Url;
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>Корзина</h1>
                <?php if (!empty($basket)): ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Название</th>
                            <th>Количество</th>
                            <th>Цена</th>
                            <th>Сумма</th>
                        </tr>
                        <?php foreach ($basket['products'] as $product): ?>
                            <tr>
                                <td><?= $product['title']; ?></td>
                                <td class="text-right"><?= $product['count']; ?></td>
                                <td class="text-right"><?= $product['price']; ?></td>
                                <td class="text-right"><?= $product['price'] * $product['count']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" class="text-right">Итого</td>
                            <td class="text-right"><?= $basket['amount']; ?></td>
                        </tr>
                    </table>
                <?php else: ?>
                    <p>Ваша корзина пуста</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>