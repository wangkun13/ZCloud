<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台登录类
 *
 * @copyright (c) 2017  致云
 * @version 2017-04-03
 */
class LoginController extends Controller {

        /**
        * 登录主页
        */
        public function index(){
            /**
             * 判断浏览器,如果为IE9,8,7,6,跳转到Error/explore页面
             */
            $explore = $_SERVER['HTTP_USER_AGENT'];

            if (strpos($explore, 'MSIE 9.0') || strpos($explore, 'MSIE 8.0') || strpos($explore, 'MSIE 7.0') || strpos($explore, 'MSIE 6.0')) {
                $this->display('Error/explore');
                exit;
            }
            $this->display();
        }

    /**
     * 登录验证
     */
    public function login(){
        if(!IS_POST)$this->error("非法请求");
        $code = I('verify','','strtolower');
        //验证验证码是否正确
//        if(!($this->check_verify($code))){
//            $this->error('验证码错误');
//        }

        $user = M('user');
        $username = trim(I('username'));
           // $username =I('username');
            $password =I('password');
            //$password =I('password','','md5');
            //验证账号密码是否正确
            $result = $user->where(array('name'=>$username,'password'=>$password))->find();
            if(!$result)
                $this->error('账号或密码错误') ;

            //验证账户是否被禁用
            if($result['status'] == 0){
                $this->error('账号被禁用，请联系超级管理员 :(') ;
            }


        $menuModel = M('menu');
        $whereMenu['status'] = 1;
        $menu = $menuModel->where($whereMenu)->order('id asc')->select();
        $menus = array_filter($menu, function($item) {
            return $item['pid'] == 0;
        });
        for ($i = 0; $i < count($menus); $i++) {
            $menup = $menus[$i];
            $childs = array_filter($menu, function($item) use($menup) {
                return $item['pid'] == $menup['id'];
            });
            $menus[$i]['childs'] = array_values($childs);
        }
        $result1['menus'] = $menus;
        $this->assign('auth', $result1);
            //更新登陆信息
//            $data =array(
//                'id' => $user['id'],
//                'update_at' => time(),
//                'login_ip' => get_client_ip(),
//            );

        $_SESSION['user_Id']=$result['id'];
        $_SESSION['user_name']=$result['name'];

        redirect(U('index/index'));



    }


    /**
     * 生成验证码
     */
    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->codeSet = '0123456789';
        $Verify->fontSize = 24;
        $Verify->length = 4;
        $Verify->imageW = 160;
        $Verify->imageH = 50;
        $Verify->entry();
    }

    /**
     * 核对验证码
     */
    protected function check_verify($code){
        $verify = new \Think\Verify();
        return $verify->check($code);
    }

}
