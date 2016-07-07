<?php
namespace RootNamespace\Model;

abstract class Model
{
    protected function insert($data)
    {
        p(__METHOD__ . '() is running ...');
    }

    protected function update($where, $data)
    {
        p(__METHOD__ . '() is running ...');
    }
}
