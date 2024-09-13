<?php
namespace common\modules\logger\controllers;

use common\modules\logger\components\LoggerFactory;
use Yii;
use yii\web\Controller;

class LogController extends Controller
{
    public function actionLog()
    {
        $message = 'Default log message';
        try {
            $logger = LoggerFactory::createLogger(Yii::$app->params['loggerType']);
            $logger->send($message);
        } catch (\Exception $e) {

        }
    }

    public function actionLogTo($type)
    {
        $message = 'Special log message';
        try {
            $logger = LoggerFactory::createLogger($type);
            $logger->send($message);
        } catch (\Exception $e) {

        }
    }

    public function actionLogToAll()
    {
        $message = 'Log message to all loggers';
        $loggers = ['email', 'db', 'file'];
        foreach ($loggers as $type) {
            try {
                $logger = LoggerFactory::createLogger($type);
                $logger->send($message);
            } catch (\Exception $e) {

            }
        }
    }
}
