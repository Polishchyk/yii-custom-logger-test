<?php


namespace common\modules\logger\components;


class FileLogger extends BaseLogger
{

    public function send(string $message): void
    {
        $fileName = __DIR__.'../runtime/logs/logfile.log';
        file_put_contents($fileName, $message . PHP_EOL, FILE_APPEND);
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        if ($loggerType === 'file') {
            $this->send($message);
        }
    }
}
