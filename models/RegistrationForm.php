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
class RegistrationForm extends User
{
    public $password_repeat;
    public $rules;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                ['surname', 'name', 'login', 'email', 'password', 'password_repeat', 'rules'],
                'required',
                'message' => 'Пожалуйста, заполните поле'
            ],
            [
                ['surname'],
                'match', 'pattern' => '/^[А-Яа-я\s\-]{1,}$/u',
                'message' => 'Можно использовать только кириллистические буквы, дефис и пробелы'
            ],
            [
                ['name'],
                'match', 'pattern' => '/^[А-Яа-я\s\-]{1,}$/u',
                'message' => 'Можно использовать только кириллистические буквы, дефис и пробелы'
            ],
            [
                ['patronymic'],
                'match', 'pattern' => '/^[А-Яа-я\s\-]{1,}$/u',
                'message' => 'Можно использовать только кириллистические буквы, дефис и пробелы'
            ],
            [
                ['login'],
                'match', 'pattern' => '/^[A-Za-z0-9\-]{4,}$/u',
                'message' => 'Можно использовать только латинские буквы, дефис и цифры'
            ],
            [['login'], 'unique', 'message' => 'Пользователь с таким логином уже зарегистрирован'],
            [['email'], 'email', 'message' => 'Некорректный email'],
            [['email'], 'unique', 'message' => 'Пользователь с таким e-mail уже зарегистрирован'],
            [['password'], 'string', 'min' => 6, 'message' => 'Пароль должен состоять минимум из 6 символов'],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
            [['rules'], 'boolean'],
            [
                ['rules'],
                'compare', 'compareValue' => true,
                'message' => 'Необходимо дать согласие'],
            [['adminRights'], 'integer'],
            [['surname', 'name', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 255],
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
            'password_repeat' => 'Повтор пароля',
            'rules' => 'Согласен с правилами регистрации',
        ];
    }
}
