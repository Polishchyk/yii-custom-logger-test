<?php
namespace common\modules\logger;

use Yii;
use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    /**
     * @var string
     */
    public $controllerNamespace = 'common\modules\logger\controllers';

    /**
     * @var string
     */
    public $defaultLoggerType;

    /**
     * @var string
     */
    public $adminEmail;

    public function init()
    {
        parent::init();
        $config = require __DIR__ . '/config/config.php';
        Yii::configure($this, $config);
    }
}
