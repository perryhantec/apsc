<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $donation_id
 * @property string|null $method
 * @property string|null $token
 * @property string|null $url
 * @property string|null $api_note
 * @property string|null $payment_note
 * @property string|null $refCode
 * @property string|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Payment extends \yii\db\ActiveRecord
{
    const STATUS_START = 'start';
    const STATUS_WAITING = 'waiting';
    const STATUS_DONE = 'done';
    const STATUS_CANCEL = 'cancel';
    const STATUS_FAIL = 'fail';

    const WEB_RETURN_STATUS_COMPLETED = 1;
    const WEB_RETURN_STATUS_ABORTED = 2;
    const WEB_RETURN_STATUS_EXPIRED = 3;
    const WEB_RETURN_STATUS_EXPIRED_UNKNOW = 4;    

    public $note_array = [];
    // public $api_note_array = [];
    // public $payment_note_array = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['order_id', 'donation_id', 'created_at', 'updated_at'], 'integer'],
            // [['note', 'status'], 'string'],
            // [['method'], 'string', 'max' => 30],
            // [['token'], 'string', 'max' => 512],
            // [['url'], 'string', 'max' => 2083],
            // [['refCode'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registration_id' => 'Registration ID',
            'method' => 'Method',
            'token' => 'Token',
            'url' => 'Url',
            // 'api_note' => 'Api Note',
            // 'payment_note' => 'Payment Note',
            'note' => 'Note',
            'refCode' => 'Ref Code',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->note_array = json_decode($this->note, true);
        if (!is_array($this->note_array))
            $this->note_array = [];
        // $this->api_note_array = json_decode($this->api_note, true);
        // $this->payment_note_array = json_decode($this->payment_note, true);
        // if (!is_array($this->api_note_array))
        //     $this->api_note_array = [];

        // if (!is_array($this->payment_note_array))
        //     $this->payment_note_array = [];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->note = json_encode($this->note_array);
        // $this->api_note = json_encode($this->api_note_array);
        // $this->payment_note = json_encode($this->payment_note_array);

        return true;
    }

    public function getRegistration()
    {
        return $this->hasOne(Registration::className(), ['id' => 'registration_id']);
    }

    public function addNote($data)
    {
        array_push($this->note_array, [
            'datetime' => date("Y-m-d H:i:s"),
            'data' => $data
        ]);
    }

    // public function addApiNote($data)
    // {
    //     array_push($this->api_note_array, [
    //         'datetime' => date("Y-m-d H:i:s"),
    //         'data' => $data
    //     ]);
    // }

    // public function addPaymentNote($data)
    // {
    //     array_push($this->payment_note_array, [
    //         'datetime' => date("Y-m-d H:i:s"),
    //         'data' => $data
    //     ]);
    // }

}
