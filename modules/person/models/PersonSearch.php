<?php

namespace app\modules\person\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\person\models\Person;

/**
 * PersonSearch represents the model behind the search form about `app\modules\person\models\Person`.
 */
class PersonSearch extends Person
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_id', 'firist_name', 'last_name', 'birthdate', 'birthplace', 'email'], 'safe'],
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
        $query = Person::find();

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
            'birthdate' => $this->birthdate,
        ]);

        $query->andFilterWhere(['like', 'document_id', $this->document_id])
            ->andFilterWhere(['like', 'firist_name', $this->firist_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'birthplace', $this->birthplace])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
