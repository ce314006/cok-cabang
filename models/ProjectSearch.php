<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `frontend\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_project'], 'integer'],
            [['no_AFCE', 'nama_project'], 'safe'],
            [['jumlah_biaya', 'sisa_biaya'], 'number'],
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
        $query = Project::find();

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
            'id_project' => $this->id_project,
            'jumlah_biaya' => $this->jumlah_biaya,
            'sisa_biaya' => $this->sisa_biaya,
        ]);

        $query->andFilterWhere(['like', 'no_AFCE', $this->no_AFCE])
            ->andFilterWhere(['like', 'nama_project', $this->nama_project]);

        return $dataProvider;
    }
}
