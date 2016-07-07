<?php
namespace RootNamespace\Model;

use RootNamespace\Model\Model;

class UserModel extends Model
{
    protected $tableName = 'user';

    public function getData($id)
    {
        p(__METHOD__ . '() is running ...');
    }
}
