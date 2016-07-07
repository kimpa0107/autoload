<?php
namespace Kim\Controller;

use Kim\Controller\Controller;
use Kim\Model\UserModel;
use Library\Wechat as WechatSDK;

class MainController extends Controller
{
    private $weObj;
    private $userModel;

    public function __construct()
    {
        parent::init();
        p(__METHOD__ . '() is running ...');

        $this->weObj = new WechatSDK();
        $this->weObj->getError();
    }

    public function getUserInfo()
    {
        p(__METHOD__ . '() is running ...');
        $this->userModel = new UserModel();
        $userInfo = $this->userModel->getData(1);
    }
}
