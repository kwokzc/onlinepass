<?php
namespace app\index\controller;
use app\index\model\Index as IndexModelIndex;
class Index
{
    public function index()
    {
        return view();
    }
    public function post_check()
    {
    	$model = new IndexModelIndex;
    	if (!empty($_POST['password'])) {
    		$result = array('status' => 1,'message' => $model->md5key($_POST['password']));
    		return $result;
    	}
    }
}
