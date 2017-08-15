<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id_project
 * @property string $nama_project
 * @property integer $jumlah_biaya
 * @property integer $sisa_biaya
 *
 * @property Bahan[] $bahans
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jumlah_biaya', 'sisa_biaya'], 'number'],
            [['no_AFCE', 'nama_project'], 'string', 'max' => 50]
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_project' => 'Id Project',
            'no_AFCE' => 'No  AFCE',
            'nama_project' => 'Nama Project',
            'jumlah_biaya' => 'Jumlah Biaya',
            'sisa_biaya' => 'Sisa Biaya',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBahans()
    {
        return $this->hasMany(Bahan::className(), ['id_project' => 'id_project']);
    }
}
