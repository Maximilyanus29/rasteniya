<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "messege_order".
 *
 * @property int $id
 * @property int $telegram_user_id
 * @property string $text
 */
class MessegeOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messege_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telegram_user_id', 'text'], 'required'],
            [['telegram_user_id'], 'string'],
            [['text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'telegram_user_id' => Yii::t('app', 'Telegram User ID'),
            'text' => Yii::t('app', 'Text'),
        ];
    }


    public static function create($text, $telegram_id)
    {
        $new_messege = new self();
        $new_messege->telegram_user_id = $telegram_id;
        $new_messege->text = $text;
        $new_messege->save();

    }
}
