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
        // var_dump($_POST['password']);
    	$model = new IndexModelIndex;
    	if (!empty($_POST['password'])) {
    		$result = array('status' => 1,'message' => $model->md5key($_POST['password']));
    		return $result;
    	}
    }
    public function post_regular()
    {
        $model = new IndexModelIndex;
        if (!empty($_POST['key'])) {
            $domain = $model->keyregular($_POST['key']);
            $result = array('status' => 1,'domain' => $domain,'pass' => $model->md5key($domain));
            return $result;
        }
    }
    public function old(){
        return view();
    }
}
