# Реалізувати спрощений модуль логування на Yii2.

Пропонується реалізувати наступний інтерфейс, з яким і будуть працювати клієнти даного модуля:
```php
interface LoggerInterface
{
/**
*	Sends message to current logger.
*
*	@param string $message
*
*	@return void
*/
public function send(string $message): void;

/**
*	Sends message by selected logger.
*
*	@param string $message
*	@param string $loggerType
*
*	@return void
*/
public function sendByLogger(string $message, string $loggerType): void;

/**
*	Gets current logger type.
*
*	@return string
*/
public function getType(): string;

/**
*	Sets current logger type.
*
*	@param string $type
*/
public function setType(string $type): void;
}

```
Логер повинен вміти працювати з різними типами логування:

- відправка повідомлення на емейл (емейл задається в конфігураційному файлі);
- запис в базу даних;
- запис в файл.

Тип логування по замовчуванню задається в конфігураційному файлі, проте може бути змінений динамічно.

**Важливо врахувати, що з часом кількість типів логування може зростати, але це не повинно зачіпати існуючий функціонал**.

Для створення об'єкта (ів) логування реалізувати фабрику(и). Крім того в завданні необхідно використовувати namespace.

Реалізовувати графічний інтерфейс немає потреби. Також допускається просте виведення на екран тексту в якості реалізації відправки емейлу, запису у файл або в БД

Готове завдання повинне включати в себе:
контролер з наступними методами:
```php
/**
*	Sends a log message to the default logger.
*/
public function log()
{
}

/**
*	Sends a log message to a special logger.
*
*	@param string $type
*/
public function logTo(string $type)
{
}

/**
*	Sends a log message to all loggers.
*/
public function logToAll()
{
}

```
- конфігураційний файл з масивом налаштувань (емейл, поточний тип логера);
- набір моделей необхідних для реалізації логування.

Виконане завдання завантажити на GitHub/GitLab/Bitbucket (на свій вибір).

# Інструкція що до установки модуля
I. Для установки модуля, потрібно клонувати поточний репозиторій в локальну директорію проекта ***common\modules***

II. Потрібно налаштувати конфіги ***config\main.php***
```php
'modules' => [
    'logger' => [
        'class' => 'common\modules\logger\Module',
    ],
],
```
III. Запустити міграцію БД для модуля 
```Shell
php yii migrate --migrationPath=@common/modules/logger/migrations
```

Url адреси для тесту логера:

- http://site.loc/logger/log/log-to?type=db - save to **db**
- http://site.loc/logger/log/log-to?type=email - send to **email**
- http://site.loc/logger/log/log - default save to** file**
- http://site.loc/logger/log/log-to-all - save to **all types** logs
