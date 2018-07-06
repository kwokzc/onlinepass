<?php
namespace app\index\model;

class Index
{
    public function md5key($pass)
    {
        $md5key=substr(md5($pass),5,9)."H";
        return $md5key;
    }
}
