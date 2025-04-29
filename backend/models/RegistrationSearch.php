<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Registration;

/**
 * PageType4Search represents the model behind the search form about `common\models\PageType4`.
 */
class RegistrationSearch extends Registration
{
    // public $file_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['id', 'MID', 'category_id', 'status', 'updated_UID'], 'integer'],
            [['id', 'payment_method', 'is_attend', 'is_vip', 'check_is_abstracted'], 'integer'],

            [['registration_no', 'title', 'first_name', 'last_name', 'email', 'mobile', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = Registration::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['created_at'=>SORT_DESC,'id'=>SORT_DESC]],
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
            'payment_method' => $this->payment_method,
            'is_attend' => $this->is_attend,
            'is_vip' => $this->is_vip,
            'check_is_abstracted' => $this->check_is_abstracted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        // $query->andFilterWhere(['like', 'author', $this->author])
        $query->andFilterWhere(['like', 'registration_no', $this->registration_no])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
