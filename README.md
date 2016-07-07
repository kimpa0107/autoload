# PHP class autoload

```php
/**
 * 自定义类自动载入函数
 */
function classLoader($className)
{
    // 注册并返回spl_autoload函数使用的默认文件扩展名
    spl_autoload_extensions('.class.php');

    // 根据项目实际情况，处理包含命名空间(namespace)的类名
    $className = preg_replace('/^RootNamespace\\\/i', '', $className);

    // 命名空间(namespace)中的反斜杠转换为当前系统的目录分隔符
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    // 载入类
    spl_autoload($className);
}

// 注册给定的函数作为 __autoload 的实现
spl_autoload_register('classLoader');
```

## Result of exec client.php

```
Client::__construct() is running ...
RootNamespace\Controller\Controller::init() is running ...
RootNamespace\Controller\MainController::__construct() is running ...
RootNamespace\Library\Wechat::__construct() is running ...
RootNamespace\Library\Wechat::getError() is running ...
RootNamespace\Controller\MainController::getUserInfo() is running ...
RootNamespace\Model\UserModel::getData() is running ...
```
