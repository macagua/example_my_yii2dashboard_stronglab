<?php

namespace app\modules\person\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property string $document_id
 * @property string $firist_name
 * @property string $last_name
 * @property string $birthdate
 * @property string $birthplace
 * @property string $email
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_id', 'firist_name', 'last_name'], 'required'],
            [['birthdate'], 'safe'],
            [['document_id'], 'string', 'max' => 16],
            [['firist_name', 'last_name'], 'string', 'max' => 45],
            [['birthplace'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'document_id' => Yii::t('app', 'Document ID'),
            'firist_name' => Yii::t('app', 'Firist Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'birthdate' => Yii::t('app', 'Birthdate'),
            'birthplace' => Yii::t('app', 'Birthplace'),
            'email' => Yii::t('app', 'Email'),
        ];
    }
}
