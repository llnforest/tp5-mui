<?php
/**
 * 菜单管理控制器
 * User: Lynn
 * Date: 2019/4/4
 * Time: 10:38
 */

namespace app\index\controller;




use chromephp\chromephp;
use think\App;

class Index extends BaseController
{
    function __construct(App $app = null)
    {
        $this->data['is_weixin'] = 1;
        parent::__construct($app);
    }

    function login(){
        return view('/login',$this->data);
    }

    function main(){
        chromephp::info($this->id);
        return view('main',$this->data);
    }
    function sendmsg(){
        return json(sucRes($this->param['type']));
    }


}