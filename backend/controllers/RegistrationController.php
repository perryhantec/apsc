<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use backend\models\RegistrationSearch;
use backend\models\PaymentEmailForm;
use backend\models\MassEmailForm;
use common\models\Registration;
use common\models\Definitions;
use PhpOffice\PhpSpreadsheet\IOFactory;
use yii\helpers\FileHelper;

class RegistrationController extends Controller
{
  public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                  //  'delete' => ['post'],
                ],
            ],
            'access' => [
              'class' => \yii\filters\AccessControl::className(),
              'ruleConfig' => [
			            'class' => AccessRule::className(),
			        ],
              'rules' => [
                  [
                    'actions' => [
                        'index', 'create', 'update', 'delete', 'view', 'export', 'export-2', 'payment-email', 'mass-email',
                        'is-attend-yes', 'is-attend-no', 'confirm-payment-yes', 'confirm-payment-no'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
            ],
        ];
    }

    public function actionIndex()
    {
      $searchModel = new RegistrationSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

    public function actionCreate()
    {
        $model = new Registration();
        $model->check_is_abstracted = 0;
        $model->country = $model::COUNTRY_HK;
        $model->dinner = 0;
        // $model->scenario = $model::SCENARIO_CREATE;

        if ($model->load(Yii::$app->request->post())) {
            $model->file_name = \yii\web\UploadedFile::getInstance($model, 'file_name');

            if ($model->saveContent()) {
              $model->sendSubmittedEmail();

              return $this->redirect(['index']);
            }
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
      $model = $this->findRegistration($id);

      return $this->render('view', [
          'model' => $model,
      ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findRegistration($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file_name = \yii\web\UploadedFile::getInstance($model, 'file_name');

            if ($model->saveContent()) {
              return $this->redirect(['index']);
            }
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
      $model = $this->findRegistration($id);
      $model->delete();

      return $this->redirect(['index']);
    }

    public function actionConfirmPaymentYes($id)
    {
        $model = $this->findRegistration($id);

        $model->status = $model::STATUS_CONFIRMED;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionConfirmPaymentNo($id)
    {
        $model = $this->findRegistration($id);

        $model->status = $model::STATUS_FORM_SUBMITTED;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionIsAttendYes($id)
    {
        $model = $this->findRegistration($id);

        $model->is_attend = 1;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionIsAttendNo($id)
    {
        $model = $this->findRegistration($id);

        $model->is_attend = 0;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    private function findRegistration($id) {
        $model = Registration::findOne($id);

        if ($model == null)
            throw new \yii\web\NotFoundHttpException();

        return $model;
    }

    public function actionExport()
    {
        $objPHPExcel = IOFactory::load(Yii::getAlias('@common/templates').'/blank.xlsx');
        $objPHPExcelActiveSheet = $objPHPExcel->getSheet(0);
  
        $col_no = 'A';
        $row_no = '1';
  
        $row_header = [
            'Pick up Badges',
            'Registration No.',
            'Title',
            'Last Name',
            'First Name',
            'Department',
            'Institution / Hospital',
            'Country',
            'Email Address',
            'Other Email Address',
            'Country Code',
            'Mobile Phone No.',
            'Other Phone No.',
            'Profession',
            'Other Profession',
            'Specialty',
            'Special Dietary Requirement',
            'Personal Statement',
            'Application for Registration Fee Refund',
            'Accommodation Arrangements',
            'Payment Type',
            'Gala Dinner',
            'Payment Method',
            'Status',
            'Is VIP',
            'Is Abstracted',
            'Faculty Dinner',
            'Created At',
            'Updated At',          
        ];
  
        $excel_headers = [
            $row_header,
        ];

        foreach ($excel_headers as $excel_header) {
            $objPHPExcelActiveSheet->fromArray($excel_header, null, $col_no.($row_no++));
        }

        $col_no = 'A';
        $row_no = '1';

        $models = Registration::find()->orderby(['created_at' => SORT_DESC])->all();
        $is_attends               = Definitions::getIsAttend();
        $prefixs                  = Definitions::getPrefix();
        $countries                = Definitions::getCountry();
        $professions              = Definitions::getProfessions();
        $specialties              = Definitions::getSpecialty();
        $dietaries                = Definitions::getDietary();
        $statements               = Definitions::getStatement();
        $is_refunds               = Definitions::getIsRefund();
        $hotels                   = Definitions::getHotel();
        $registration_fee_labels  = Definitions::getRegistrationFeeLabel();
        $registration_fee_amounts = Definitions::getRegistrationFeeAmount();
        $payment_method_details   = Definitions::getPaymentMethodDetail();
        $registration_status      = Definitions::getRegistrationStatus();
        $is_vips                  = Definitions::getIsVip();
        $check_is_abstracteds     = Definitions::getCheckIsAbstracted();
        $faculty_dinners          = Definitions::getFacultyDinner();

        foreach($models as $model){
            $usd = $hkd = 0;
            if ($model->payment_method != null) {
                $usd = $registration_fee_amounts[$model->payment_method];
                $hkd = $usd * 8;
            }
            $excel_row = [
                $model->is_attend !== null ? $is_attends[$model->is_attend] : '', // 0 or 1, !== required
                $model->registration_no,
                $model->title != null ? $prefixs[$model->title] : '',
                $model->last_name,
                $model->first_name,
                $model->department,
                $model->institution,
                $model->country != null ? $countries[$model->country] : '',
                $model->email,
                $model->other_email,
                $model->country_code,
                $model->mobile,
                $model->office_phone,
                $model->professions != null ? $professions[$model->professions] : '',
                $model->other_pro,
                $model->specialty != null ? $specialties[$model->specialty] : '',
                $model->dietary != null ? $dietaries[$model->dietary] : '',
                $model->statement != null ? $statements[$model->statement] : '',
                $model->is_refund != null ? $is_refunds[$model->is_refund] : '',
                $model->hotel != null ? $hotels[$model->hotel] : '',
                $model->payment_type != null ? $registration_fee_labels[$model->payment_method].' - USD '.$usd.' / HKD '.$hkd : '',
                $model->dinner,
                $model->payment_method != null ? $payment_method_details[$model->payment_method] : '',
                $model->status != null ? $registration_status[$model->status] : '',
                $model->is_vip != null ? $is_vips[$model->is_vip] : '',
                $model->check_is_abstracted !== null ? $check_is_abstracteds[$model->check_is_abstracted] : '', // 0 or 1, !== required
                $model->faculty_dinner !== null ? $faculty_dinners[$model->faculty_dinner] : '', // 0 or 1, !== required
                $model->created_at,
                $model->updated_at,
            ];

            $objPHPExcelActiveSheet->fromArray($excel_row, null, $col_no.(++$row_no));
            $objPHPExcelActiveSheet->getStyle('J'.$row_no)->getAlignment()->setWrapText(true);
        }

        $objPHPExcel->setActiveSheetIndex(0);
  
        $objPHPExcelActiveSheet = $objPHPExcel->getSheet(0);
        $objPHPExcelActiveSheet->getStyle('A1');

        $objPHPExcelActiveSheet->getColumnDimension('A')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('B')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('C')->setWidth(15);
        $objPHPExcelActiveSheet->getColumnDimension('D')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('E')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('F')->setWidth(30);
        $objPHPExcelActiveSheet->getColumnDimension('G')->setWidth(40);
        $objPHPExcelActiveSheet->getColumnDimension('H')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('I')->setWidth(25);
        $objPHPExcelActiveSheet->getColumnDimension('J')->setWidth(25);
        $objPHPExcelActiveSheet->getColumnDimension('K')->setWidth(15);
        $objPHPExcelActiveSheet->getColumnDimension('L')->setWidth(25);
        $objPHPExcelActiveSheet->getColumnDimension('M')->setWidth(25);
        $objPHPExcelActiveSheet->getColumnDimension('N')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('O')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('P')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('Q')->setWidth(30);
        $objPHPExcelActiveSheet->getColumnDimension('R')->setWidth(70);
        $objPHPExcelActiveSheet->getColumnDimension('S')->setWidth(50);
        $objPHPExcelActiveSheet->getColumnDimension('T')->setWidth(90);
        $objPHPExcelActiveSheet->getColumnDimension('U')->setWidth(85);
        $objPHPExcelActiveSheet->getColumnDimension('V')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('W')->setWidth(100);
        $objPHPExcelActiveSheet->getColumnDimension('X')->setWidth(25);
        $objPHPExcelActiveSheet->getColumnDimension('Y')->setWidth(15);
        $objPHPExcelActiveSheet->getColumnDimension('Z')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('AA')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('AB')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('AC')->setWidth(20);

  
        $filename = 'Registration_'.date('Ymd_His').'.xlsx';
        $writer = IOFactory::createWriter($objPHPExcel, "Xlsx");
        $temp_file = tempnam(sys_get_temp_dir(), 'PhpSpreadsheet');
        $writer->save($temp_file);
  
        Yii::$app->response->sendFile($temp_file, $filename, ['mimeType' => FileHelper::getMimeTypeByExtension($filename)]);
    }

    public function actionExport2()
    {
        $objPHPExcel = IOFactory::load(Yii::getAlias('@common/templates').'/blank.xlsx');
        $objPHPExcelActiveSheet = $objPHPExcel->getSheet(0);
  
        $col_no = 'A';
        $row_no = '1';
  
        $row_header = [
            'Title',
            'Last Name',
            'First Name',
            'Country',
            'Registration No.',
        ];
  
        $excel_headers = [
            $row_header,
        ];

        foreach ($excel_headers as $excel_header) {
            $objPHPExcelActiveSheet->fromArray($excel_header, null, $col_no.($row_no++));
        }

        $col_no = 'A';
        $row_no = '1';

        $models = Registration::find()->orderby(['created_at' => SORT_DESC])->all();
        $prefixs                  = Definitions::getPrefix();
        $countries                = Definitions::getCountry();

        foreach($models as $model){
            $excel_row = [
                $model->title != null ? $prefixs[$model->title] : '',
                $model->last_name,
                $model->first_name,
                $model->country != null ? $countries[$model->country] : '',
                $model->registration_no,
            ];

            $objPHPExcelActiveSheet->fromArray($excel_row, null, $col_no.(++$row_no));
        }

        $objPHPExcel->setActiveSheetIndex(0);
  
        $objPHPExcelActiveSheet = $objPHPExcel->getSheet(0);
        $objPHPExcelActiveSheet->getStyle('A1');

        $objPHPExcelActiveSheet->getColumnDimension('A')->setWidth(15);
        $objPHPExcelActiveSheet->getColumnDimension('B')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('C')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('D')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('E')->setWidth(20);
  
        $filename = 'Registration2_'.date('Ymd_His').'.xlsx';
        $writer = IOFactory::createWriter($objPHPExcel, "Xlsx");
        $temp_file = tempnam(sys_get_temp_dir(), 'PhpSpreadsheet');
        $writer->save($temp_file);
  
        Yii::$app->response->sendFile($temp_file, $filename, ['mimeType' => FileHelper::getMimeTypeByExtension($filename)]);
    }

    public function actionPaymentEmail()
    {
        $model = new PaymentEmailForm();
        // $model->vendor_type = 1;

        if ($model->load(Yii::$app->request->post()) && $model->submitPaymentEmail()) {
            return $this->redirect(['index']); 
        } else {
            return $this->render('payment-email', [
                'model' => $model,
            ]);
        }
    }

    public function actionMassEmail()
    {
        $model = new MassEmailForm();
        // $model->vendor_type = 1;

        if ($model->load(Yii::$app->request->post()) && $model->submitMassEmail()) {
            return $this->redirect(['index']); 
        } else {
            return $this->render('mass-email', [
                'model' => $model,
            ]);
        }
    }
}
