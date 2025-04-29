<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Printer;

/**
 * PageType4Search represents the model behind the search form about `common\models\PageType4`.
 */
class PrinterSearch extends Printer
{
    // public $file_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['id', 'MID', 'category_id', 'status', 'updated_UID'], 'integer'],

            [['location', 'ip', 'created_at', 'updated_at'], 'safe'],
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
        $query = Printer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['updated_at'=>SORT_DESC,'id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        // $query->andFilterWhere(['like', 'author', $this->author])
        $query->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'ip', $this->ip]);

        return $dataProvider;
    }
}
