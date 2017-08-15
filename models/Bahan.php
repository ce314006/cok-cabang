<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bahan".
 *
 * @property integer $id_bahan
 * @property integer $id_project
 * @property string $nama_bahan
 * @property string $jumlah_bahan
 * @property integer $harga_bahan
 *
 * @property Project $idProject
 */
class Bahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_project'], 'integer'],
            [['jumlah_bahan', 'harga_bahan'], 'number'],
            [['nama_bahan'], 'string', 'max' => 50],
            [['unit'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->hasOne(Project::className(),['id_project' =>'id_project']);
    }
    public function attributeLabels()
    {
        return [
            'id_bahan' => 'Id Bahan',
            'id_project' => 'Id Project',
            'nama_project'=>'Nama Project',
            'nama_bahan' => 'Nama Bahan',
            'jumlah_bahan' => 'Jumlah Bahan',
            'unit' => 'Unit',
            'harga_bahan' => 'Harga Bahan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProject()
    {
        return $this->hasOne(Project::className(), ['id_project' => 'id_project']);
    }
}
