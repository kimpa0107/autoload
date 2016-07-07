<?php
namespace Library;

class Wechat
{
    private $error = '';

    public function __construct()
    {
        p(__METHOD__ . '() is running ...');
    }

    private function _setError($error)
    {
        p(__METHOD__ . '() is running ...');
        $this->error = $error;
    }

    public function getError()
    {
        p(__METHOD__ . '() is running ...');
        return $this->error;
    }
}
