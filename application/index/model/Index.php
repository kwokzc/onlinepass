<?php
namespace app\index\model;

class Index
{
    public function md5key($pass)
    {
        $md5key=substr(md5($pass),5,9)."H";
        return $md5key;
    }

    public function keyregular($url)
    // 接收url 返回经过正则后的顶级域名
    // 例如：https://mbd.baidu.com/newspage/data/landingsuper
    // 返回：baidu.com
    {
    	preg_match("#://(www.)?(\w+(\.)?)+#", $url, $regularurl);
    	// 匹配域名 返回正则结果
        $tmp = substr($regularurl[0],3);
        // 去除结果内多余字符 返回域名
        
        //判断是否有二级域名，如果有则去除
        //需要注意"xxx.com.cn"这种域名会错误的返回"com.cn"
        //但"www.xxx.com.cn"会正确返回"xxx.com.cn"
        if(substr_count($tmp,'.')>1){
        	return substr($tmp,stripos($tmp,'.')+1);
        }else{
        	return $tmp;
        }
    }
}
