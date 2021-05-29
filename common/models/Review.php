<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $username
 * @property string $disadvantages
 * @property string $dignity
 * @property string $comment
 * @property int $rating
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'disadvantages', 'dignity', 'comment', 'rating'], 'required'],
            [['disadvantages', 'dignity', 'comment'], 'string'],
            [['rating'], 'integer'],
            [['username'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'disadvantages' => Yii::t('app', 'Disadvantages'),
            'dignity' => Yii::t('app', 'Dignity'),
            'comment' => Yii::t('app', 'Comment'),
            'rating' => Yii::t('app', 'Rating'),
        ];
    }
}
