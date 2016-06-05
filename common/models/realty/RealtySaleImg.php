<?php

namespace common\models\realty;

use Yii;
use common\models\users\User;

/**
 * This is the model class for table "realty_sale_img".
 *
 * @property string $id
 * @property string $id_ads
 * @property string $id_user
 * @property string $img
 *
 * @property RealtySale $idAds
 * @property User $idUser
 */
class RealtySaleImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'realty_sale_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ads', 'id_user'], 'integer'],
            [['img'], 'string', 'max' => 50],
            [['id_ads'], 'exist', 'skipOnError' => true, 'targetClass' => RealtySale::className(), 'targetAttribute' => ['id_ads' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ads' => 'Id Ads',
            'id_user' => 'Id User',
            'img' => 'Img',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasOne(RealtySale::className(), ['id' => 'id_ads']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
