<?php
use RootNamespace\Controller\MainController;

require_once __DIR__ . '/conf/require.php';

class Client
{
    private $mainCtrl;
    public function __construct()
    {
        p(__METHOD__ . '() is running ...');
        p('<hr/>');
        $this->mainCtrl = new MainController();
        p('<hr/>');
        $this->mainCtrl->getUserInfo();
    }
}

$worker = new Client();
