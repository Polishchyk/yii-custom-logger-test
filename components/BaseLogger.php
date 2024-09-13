<?php

namespace common\modules\logger\components;


abstract class BaseLogger implements LoggerInterface
{
    protected string $type;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
