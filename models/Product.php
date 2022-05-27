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
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'year', 'publishingHouse', 'antagonist', 'categoryId', 'price', 'picture', 'count'], 'required'],
            [['year', 'categoryId', 'count'], 'integer'],
            [['price'], 'number'],
            [['timestamp'], 'safe'],
            [['picture'], 'file', 'extensions' => 'png, jpg, jpeg, bmp', 'maxSize' => 10 * 1024 * 1024],
            [['title', 'publishingHouse', 'antagonist', 'picture'], 'string', 'max' => 255],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['categoryId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'year' => 'Год ',
            'publishingHouse' => 'Издательство',
            'antagonist' => 'Антагонист',
            'categoryId' => 'Категория',
            'price' => 'Цена',
            'timestamp' => 'Время создания',
            'picture' => 'Изображение',
            'count' => 'Количество в наличии',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'categoryId']);
    }
}
