I. Для установки модуля, потрібно клонувати поточний репозиторій в локальну директорію проекта ***common\modules***

II. Потрібно налаштувати конфіги 
***config\main.php***
```
'modules' => [
    'logger' => [
        'class' => 'common\modules\logger\Module',
    ],
],
```
III. Запустити міграцію БД для модуля 
```
php yii migrate --migrationPath=@common/modules/logger/migrations
```

Url адреси для тесту логера:

- http://site.loc/logger/log/log-to?type=db - save to db
- http://site.loc/logger/log/log - default save to file
- http://site.loc/logger/log/log-to-all - save to all types logs
