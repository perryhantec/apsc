<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PageType6;

/**
 * PageType4Search represents the model behind the search form about `common\models\PageType4`.
 */
class PageType6Search extends PageType6
{
    public $title = NULL;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['id', 'MID', 'category_id', 'status', 'updated_UID'], 'integer'],
            [['id', 'MID', 'status', 'updated_UID'], 'integer'],
            // [['display_at', 'author', 'title_tw', 'title_cn', 'title_en', 'content', 'created_at', 'updated_at'], 'safe'],
            [['display_at', 'title_tw', 'title_cn', 'title_en', 'created_at', 'updated_at'], 'safe'],
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
        $query = PageType6::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['display_at'=>SORT_DESC,'id'=>SORT_DESC]],
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
            'MID' => $this->MID,
            'display_at' => $this->display_at,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'updated_UID' => $this->updated_UID,
        ]);

        $query->andFilterWhere(['like', 'title_tw', $this->title_tw])
            ->andFilterWhere(['like', 'title_cn', $this->title_cn])
            ->andFilterWhere(['like', 'title_en', $this->title_en]);

        return $dataProvider;
    }
}
