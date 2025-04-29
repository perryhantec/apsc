<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CallForAbstract;

/**
 * PageType4Search represents the model behind the search form about `common\models\PageType4`.
 */
class CallForAbstractSearch extends CallForAbstract
{
    // public $file_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'abstract_status','result', 'accept_type', 'check_is_registered'], 'integer'],
            // [['title', 'abstract_status', 'created_at', 'updated_at'], 'safe'],
            [['abstract_no', 'title', 'created_at', 'updated_at'], 'safe'],
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
        // $query = CallForAbstract::find()->where(['abstract_status' => CallForAbstract::ABSTRACT_STATUS_SUBMITTED]);
        $query = CallForAbstract::find();

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
            'user_id' => $this->user_id,
            'abstract_status' => $this->abstract_status,
            'result' => $this->result,
            'accept_type' => $this->accept_type,
            'check_is_registered' => $this->check_is_registered,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        // $query->andFilterWhere(['like', 'author', $this->author])
        $query->andFilterWhere(['like', 'title', $this->title])
              ->andFilterWhere(['like', 'abstract_no', $this->abstract_no]);

        return $dataProvider;
    }
}
