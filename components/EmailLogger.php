<?php

namespace common\modules\logger\components;

use Yii;

class EmailLogger extends BaseLogger
{

    public function send(string $message): void
    {
        $email = Yii::$app->mailer->compose();
        $email->setTo(Yii::$app->params['adminEmail'])
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject('Log')
            ->setTextBody($message)
            ->send();
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        if ($loggerType === 'email') {
            $this->send($message);
        }
    }
}
