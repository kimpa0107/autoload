<?php

require_once __DIR__ . '/define.php';
require_once ROOT_PATH . '/Common/function.php';

// 命名空间配置
// 命名空间分多级时，反斜杠写3个
$namespaceConfig = array(
    // '命名空间' => '指向目录',
    'Kim'     => '.',
    'Vendor\\\Library' => './Library'
);

/**
 * 自定义类自动载入函数
 */
function classLoader($className)
{
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
    $className = ltrim($className, '.');
    $classFile = ROOT_PATH . $className . '.class.php';
    // 载入类
    require_once $classFile;
}
// 注册给定的函数作为 __autoload 的实现
spl_autoload_register('classLoader');
