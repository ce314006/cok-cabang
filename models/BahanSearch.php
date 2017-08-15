<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Bahan;

/**
 * BahanSearch represents the model behind the search form about `frontend\models\Bahan`.
 */
class BahanSearch extends Bahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bahan', 'id_project'], 'integer'],
            [['nama_bahan', 'unit'], 'safe'],
            [['jumlah_bahan', 'harga_bahan'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Bahan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_bahan' => $this->id_bahan,
            'id_project' => $this->id_project,
            'jumlah_bahan' => $this->jumlah_bahan,
            'harga_bahan' => $this->harga_bahan,
        ]);

        $query->andFilterWhere(['like', 'nama_bahan', $this->nama_bahan])
            ->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }
}
