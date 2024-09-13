<?php

namespace common\modules\logger\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%log}}".
 *
 * @property int $id unique identifier for a log
 * @property string $message text log
 */
class Log extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%log}}';
    }

    public function rules()
    {
        return [
            [['message'], 'required'],
        ];
    }
}
