<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use backend\models\CallForAbstractSearch;
use backend\models\CallForAbstractSendEmail;
use common\models\CallForAbstract;
use common\models\Definitions;
use PhpOffice\PhpSpreadsheet\IOFactory;
use yii\helpers\FileHelper;

class CallForAbstractController extends Controller
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
                  'actions' => ['index', 'create', 'update', 'delete', 'export', 'view', 'send-email'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
            ],
        ];
    }

    public function actionIndex()
    {
      $searchModel = new CallForAbstractSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      // $models = CallForAbstract::find()->where(['abstract_no' => null])->all();

      // foreach ($models as $model) {
      //   $model->abstract_no = Definitions::setCode(CallForAbstract::ABSTRACT_NO_PREFIX, CallForAbstract::ABSTRACT_NO_LENGTH, $model->id);

      //   $model->updateAttributes(['abstract_no']);
      // }

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

    public function actionCreate()
    {
        $model = new CallForAbstract();
        $model->check_is_registered = 0;
        // $model->scenario = $model::SCENARIO_CREATE;

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

    public function actionView($id)
    {
      $model = $this->findCallForAbstract($id);

      return $this->render('view', [
          'model' => $model,
      ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findCallForAbstract($id);

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
      $model = $this->findCallForAbstract($id);
      $model->delete();

      return $this->redirect(['index']);
    }
    
    private function findCallForAbstract($id) {
        $model = CallForAbstract::findOne($id);

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
          'Abstract No.',
          'Abstract User',
          'Abstract Title',
          'Presentation Type',
          'Keyword 1',
          'Keyword 2',
          'Keyword 3',
          'Theme',
          'Author Affiliation',
          'Abstract Authors',
          'Abstract',
          'Young Investigator Award',
          'Register Preference',
          'Abstract Status',
          'Result',
          'Accept Type',
          'Is Registered',
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

        $models = CallForAbstract::find()->orderby(['updated_at' => SORT_DESC])->all();
        $users                = Definitions::getUser();
        $present_types        = Definitions::getPresentationType();
        $themes               = Definitions::getTheme();
        $prefixs              = Definitions::getPrefix();
        $is_youngs            = Definitions::getIsYoung();
        $is_registereds       = Definitions::getIsRegistered();
        $abstract_status      = Definitions::getAbstractStatusNoIcon();
        $results              = Definitions::getResult();
        $accept_types         = Definitions::getAcceptType();
        $check_is_registereds = Definitions::getCheckIsRegistered();
        $is_presenters        = ['No','Yes'];

        foreach($models as $model){
            $affiliations = $authors = '';

            if (count($model->affiliation) > 0) {
              $affiliations = [];

              foreach ($model->affiliation as $row => $affiliation) {
                $temp_affiliations = [];

                array_push($temp_affiliations, 'Row : '.$row);
                array_push($temp_affiliations, 'Affiliation : '.$affiliation['affiliation']);
                array_push($temp_affiliations, 'City/Suburb/Town : '.$affiliation['city']);
                array_push($temp_affiliations, 'State : '.$affiliation['state']);
                array_push($temp_affiliations, 'Country : '.$affiliation['country']);

                array_push($affiliations, implode(', ', $temp_affiliations));
              }
              
              $affiliations = implode("\n", $affiliations);
            }

            if (count($model->author) > 0) {
              $authors = [];

              foreach ($model->author as $author) {
                $temp_authors = [];

                array_push($temp_authors, 'Title : '.$prefixs[$author['tle']]);
                array_push($temp_authors, 'First Name : '.$author['first_name']);
                array_push($temp_authors, 'Last Name : '.$author['last_name']);
                array_push($temp_authors, 'Presenter : '.$is_presenters[$author['is_presenter']]);
                array_push($temp_authors, 'Organization : '.$author['organization']);
                array_push($temp_authors, 'Position : '.$author['position']);
                array_push($temp_authors, 'Affiliations : '.$author['affiliations']);

                array_push($authors, implode(', ', $temp_authors));
              }
              
              $authors = implode("\n", $authors);
            }

            
            // $student_course_classes = [];
            // if (count($model->studentCourseClass) > 0) {
            //   foreach ($model->studentCourseClass as $student_course_class) {
            //     $student_course_classes[] = $course_class_nos[$student_course_class->course_class_id];
            //   }
              
            //   $student_course_classes = implode(', ',$student_course_classes);
            // }
            
            $excel_row = [
                $model->abstract_no,
                $users[$model->user_id],
                $model->title,
                $model->present_type != null ? $present_types[$model->present_type] : '',
                $model->keyword_1,
                $model->keyword_2,
                $model->keyword_3,
                $model->theme != null ? $themes[$model->theme] : '',
                $affiliations,
                $authors,
                $model->content,
                $model->is_young != null ? $is_youngs[$model->is_young] : '',
                $model->is_registered != null ? $is_registereds[$model->is_registered] : '',
                $model->abstract_status != null ? $abstract_status[$model->abstract_status] : '',
                $model->result != null ? $results[$model->result] : '',
                $model->accept_type != null ? $accept_types[$model->accept_type] : '',
                $model->check_is_registered !== null ? $check_is_registereds[$model->check_is_registered] : '', // 0 or 1, !== required
                $model->created_at,
                $model->updated_at,
            ];

            $objPHPExcelActiveSheet->fromArray($excel_row, null, $col_no.(++$row_no));
            $objPHPExcelActiveSheet->getStyle('C'.$row_no)->getAlignment()->setWrapText(true);
            $objPHPExcelActiveSheet->getStyle('I'.$row_no)->getAlignment()->setWrapText(true);
            $objPHPExcelActiveSheet->getStyle('J'.$row_no)->getAlignment()->setWrapText(true);
            $objPHPExcelActiveSheet->getStyle('K'.$row_no)->getAlignment()->setWrapText(true);
        }

        $objPHPExcel->setActiveSheetIndex(0);
  
        $objPHPExcelActiveSheet = $objPHPExcel->getSheet(0);
        $objPHPExcelActiveSheet->getStyle('A1');

        $objPHPExcelActiveSheet->getColumnDimension('A')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('B')->setWidth(25);
        $objPHPExcelActiveSheet->getColumnDimension('C')->setWidth(40);
        $objPHPExcelActiveSheet->getColumnDimension('D')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('E')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('F')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('G')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('H')->setWidth(50);
        $objPHPExcelActiveSheet->getColumnDimension('I')->setWidth(80);
        $objPHPExcelActiveSheet->getColumnDimension('J')->setWidth(120);
        $objPHPExcelActiveSheet->getColumnDimension('K')->setWidth(100);
        $objPHPExcelActiveSheet->getColumnDimension('L')->setWidth(25);
        $objPHPExcelActiveSheet->getColumnDimension('M')->setWidth(110);
        $objPHPExcelActiveSheet->getColumnDimension('N')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('O')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('P')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('Q')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('R')->setWidth(20);
        $objPHPExcelActiveSheet->getColumnDimension('S')->setWidth(20);

  
        $filename = 'Call_For_Abstract_'.date('Ymd_His').'.xlsx';
        $writer = IOFactory::createWriter($objPHPExcel, "Xlsx");
        $temp_file = tempnam(sys_get_temp_dir(), 'PhpSpreadsheet');
        $writer->save($temp_file);
  
        Yii::$app->response->sendFile($temp_file, $filename, ['mimeType' => FileHelper::getMimeTypeByExtension($filename)]);
    }

    public function actionSendEmail()
    {
      // $model = CallForAbstractSendEmail::find()->where(['abstract_status' => CallForAbstract::ABSTRACT_STATUS_SUBMITTED])->orderby(['abstract_no' => SORT_DESC])->all();
      $model = new CallForAbstractSendEmail;

      if ($model->load(Yii::$app->request->post()) && $model->submitEmail()) {
          return $this->redirect(['index']);
      }

      return $this->render('send-email', [
          'model' => $model,
      ]);
    }
}
