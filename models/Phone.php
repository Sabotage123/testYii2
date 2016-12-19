<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phone".
 *
 * @property integer $id_phone
 * @property string $number
 * @property integer $id_phonbook
 *
 * @property Phonebook $idPhonbook
 */
class Phone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'id_phonbook'], 'required'],
            ['number', 'match', 'pattern' => '/^\d{10}$/','message' => 'Не соотвецтвует формату введите 10 цыфр'],
            [['id_phonbook'], 'exist', 'skipOnError' => true, 'targetClass' => Phonebook::className(), 'targetAttribute' => ['id_phonbook' => 'id_phonbook']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_phone' => 'Id Phone',
            'number' => 'Номер',
            'id_phonbook' => 'Id Phonbook',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPhonbook()
    {
        return $this->hasOne(Phonebook::className(), ['id_phonbook' => 'id_phonbook']);
    }
}
