<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TabAgentesProceso;

/**
 * TabAgentesProcesoSearch represents the model behind the search form of `frontend\models\TabAgentesProceso`.
 */
class TabAgentesProcesoSearch extends TabAgentesProceso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_AGENTE'], 'integer'],
            [['NOMBRES_APÉLLIDOS', 'DISTRITO'], 'safe'],
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
        $query = TabAgentesProceso::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_AGENTE' => $this->ID_AGENTE,
        ]);

        $query->andFilterWhere(['like', 'NOMBRES_APÉLLIDOS', $this->NOMBRES_APÉLLIDOS])
            ->andFilterWhere(['like', 'DISTRITO', $this->DISTRITO]);

        return $dataProvider;
    }
}
