<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phonebook".
 *
 * @property integer $id_phonbook
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $date
 *
 * @property Phone[] $phones
 */
class Phonebook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phonebook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'date'], 'required'],
            [['date'], 'safe'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 55],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_phonbook' => 'Id Phonbook',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhones()
    {
        return $this->hasMany(Phone::className(), ['id_phonbook' => 'id_phonbook']);
    }
}
