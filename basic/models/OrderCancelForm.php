<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property int $year
 * @property string $publishingHouse
 * @property string $antagonist
 * @property int $categoryId
 * @property float $price
 * @property string $timestamp
 * @property string $picture
 * @property int $count
 *
 * @property Category $category
 */
class OrderCancelForm extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reason'], 'required'],
        ];
    }
}
