# PHP class autoload


## 命名空间配置
`命名空间分多级时，反斜杠写3个`
```php
$namespaceConfig = array(
    // '命名空间' => '指向目录',
    'Kim'     => '.',
    'Vendor\\\Library' => './Library'
);
```

## 自动载入

```php
/**
 * 自定义类自动载入函数
 */
function classLoader($className)
{
    // 注册并返回spl_autoload函数使用的默认文件扩展名
    spl_autoload_extensions('.class.php');

    // 命名空间转为实际路径
    global $namespaceConfig;
    foreach ($namespaceConfig as $root => $target) {
        if (preg_match('/^' . $root . '/i', $className)) {
            $className = preg_replace('/^' . $root . '/i', $target, $className);
            break;
        }
    }

    // 命名空间(namespace)中的反斜杠转换为当前系统的目录分隔符
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    // 载入类
    spl_autoload($className);
}

// 注册给定的函数作为 __autoload 的实现
spl_autoload_register('classLoader');
```

## 执行client.php结果
```php
Client::__construct() is running ...
```
```php
Kim\Controller\Controller::init() is running ...
Kim\Controller\MainController::__construct() is running ...
Vendor\Library\Wechat::__construct() is running ...
Vendor\Library\Wechat::getError() is running ...
```
```php
Kim\Controller\MainController::getUserInfo() is running ...
Kim\Model\UserModel::getData() is running ...
```
