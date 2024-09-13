<?php

namespace common\modules\logger\components;


use common\modules\logger\models\Log;
use yii\db\Exception;

class DbLogger extends BaseLogger
{

    public function send(string $message): void
    {
        $log = new Log();
        $log->message = $message;
        try {
            $log->save();
        } catch (Exception $e) {

        }
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        if ($loggerType === 'db') {
            $this->send($message);
        }
    }
}
