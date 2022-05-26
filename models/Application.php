<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $userId
 * @property int $categoryId
 * @property string $timestamp
 * @property string $status
 * @property string $pictureApplication
 * @property string|null $pictureDesign
 *
 * @property Category $category
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'userId', 'categoryId', 'pictureApplication'], 'required'],
            [['description', 'status'], 'string'],
            [['userId', 'categoryId'], 'integer'],
            [['timestamp'], 'safe'],
            [['title', 'pictureApplication', 'pictureDesign'], 'string', 'max' => 255],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
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
            'title' => 'Title',
            'description' => 'Description',
            'userId' => 'User ID',
            'categoryId' => 'Category ID',
            'timestamp' => 'Timestamp',
            'status' => 'Status',
            'pictureApplication' => 'Picture Application',
            'pictureDesign' => 'Picture Design',
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
