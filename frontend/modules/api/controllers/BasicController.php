<?php

namespace frontend\modules\api\controllers;

use yii\rest\ActiveController;

class BasicController extends ActiveController
{
    /**
     * @var array
     */
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    /*
     * Функция запускается перед выдачей данных
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        return true;
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => \yii\filters\ContentNegotiator::class,
                'formatParam' => '_format',
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                    'xml' => \yii\web\Response::FORMAT_XML
                ],
            ],
        ];
    }
}