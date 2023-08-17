<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $address
 */
class Profile extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone_number', 'address'], 'required'],
            [['address'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['phone_number'], 'integer', 'min' => 10],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['name','email','phone_number', 'address']; 
        return $scenarios; 
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'address' => 'Address',
        ];
    }
}
