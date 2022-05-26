<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fullName
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $adminRights
 *
 * @property Application[] $applications
 */
class RegistrationForm extends User
{
    public $passwordConfirm;
    public $consent;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                ['fullName', 'login', 'email', 'password', 'passwordConfirm', 'consent'],
                'required',
                'message' => 'Пожалуйста, заполните поле'
            ],
            [
                ['fullName'],
                'match', 'pattern' => '/^[А-Яа-я\s\-]{6,}$/u',
                'message' => 'Можно использовать только кириллистические буквы, дефис и пробелы'],
            [
                ['login'],
                'match', 'pattern' => '/^[A-Za-z0-9]{4,}$/u',
                'message' => 'Можно использовать только латинские буквы'
            ],
            [['login'], 'unique', 'message' => 'Пользователь с таким логином уже зарегистрирован'],
            [['email'], 'email', 'message' => 'Некорректный email'],
            [['email'], 'unique', 'message' => 'Пользователь с таким email уже зарегистрирован'],
            [['passwordConfirm'], 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
            [['consent'], 'boolean'],
            [
                ['consent'],
                'compare', 'compareValue' => true,
                'message' => 'Необходимо дать согласие'],
            [['adminRights'], 'integer'],
            [['fullName', 'login', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullName' => 'ФИО',
            'login' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'adminRights' => 'Права администратора',
            'passwordConfirm' => 'Повтор пароля',
            'consent' => 'Даю согласие на обработку персональных данных',
        ];
    }
}
