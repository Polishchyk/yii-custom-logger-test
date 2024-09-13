<?php

namespace common\modules\logger\components;


class LoggerFactory
{
    public static function createLogger(string $type): LoggerInterface
    {
        switch ($type) {
            case 'email':
                return new EmailLogger();
            case 'db':
                return new DbLogger();
            case 'file':
                return new FileLogger();
            default:
                throw new \Exception("Unsupported logger type: $type");
        }
    }
}
