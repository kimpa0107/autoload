<?php

require_once __DIR__ . '/define.php';
require_once ROOT_PATH . '/Common/function.php';

// 命名空间配置
$namespaceConfig = array(
    // '命名空间' => '指向目录',
    'Kim'     => '.',
    'Library' => './Library'
);

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
