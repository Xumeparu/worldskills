<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string|null $patronymic
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $adminRights
 *
 * @property Order[] $orders
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'login', 'email', 'password'], 'required'],
            [['adminRights'], 'integer'],
            [['surname', 'name', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'adminRights' => 'Права администратора',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['userId' => 'id']);
    }

    // Изначальные методы до переопределения файла

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null) { }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return User|array|\yii\db\ActiveRecord|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['login' => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey() { }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey) { }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
