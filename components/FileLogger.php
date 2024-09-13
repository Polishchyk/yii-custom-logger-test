<?php


namespace common\modules\logger\components;


use Yii;

class FileLogger extends BaseLogger
{

    public function send(string $message): void
    {
        $logDir = Yii::getAlias('@common/modules/logger/runtime/logs');
        $fileName = $logDir.'/logfile-'.date("d-m-Y").'.log';
        if (!file_exists($fileName)) {
            touch($fileName);
        }
        file_put_contents($fileName, $message . PHP_EOL, FILE_APPEND);
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        if ($loggerType === 'file') {
            $this->send($message);
        }
    }
}
