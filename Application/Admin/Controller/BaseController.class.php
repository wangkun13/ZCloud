<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台基本类
 *
 * @author WK
 * @copyright  2017  致云
 * @version 2017-04-03
 */
class BaseController extends Controller {

    protected function _initialize(){
        /**
         * 判断浏览器,如果为IE9,8,7,6,跳转到Error/explore页面
         */
        $explore = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($explore, 'MSIE 9.0') || strpos($explore, 'MSIE 8.0') || strpos($explore, 'MSIE 7.0') || strpos($explore, 'MSIE 6.0')) {
            $this->display('Error/explore');
            exit;
        }
        /**
         * 判断是否登录,未登录则重定向到 Login/index页面
         */

        if (!session('user_name')) {
            redirect(U('Login/index'));
        }
        $this->getAuth();
    }

    /**
     * 获取左侧菜单
     */
    protected function getAuth() {
        $menuModel = M('menu');
        $whereMenu['status'] = 1;
        $menu = $menuModel->where($whereMenu)->order('id asc')->select();
//        $url=(__MODULE__.'/');
//        for($i=0;$i<count($menu);$i++){
//            $menu[$i]['href'] = $url.$menu[$i]['href'];
//        }

        $menus = array_filter($menu, function($item) {
            return $item['pid'] == 0;
        });
        for ($i = 0; $i < count($menus); $i++) {
           // $menus[$i]['href'] = $url.$menus[$i]['href'];
            $menup = $menus[$i];
            $childs = array_filter($menu, function($item) use($menup) {
                return $item['pid'] == $menup['id'];
            });
            $menus[$i]['childs'] = array_values($childs);
        }

        $result['menus'] = $menus;

        $this->assign('auth', $result);
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


    /**
     * 上传图片或视频
     * @param array $file 要上传的文件
     * @param string $ctrlName 要存放的子目录，一般对应控制器名
     * @param float $lat 景区的经度
     * @param float $lon 景区的纬度
     * @param int $size 文件的最大大小
     * @param string $type 文件的类型，默认为image/jpeg|image/png
     *
     * @return string 文件的相对路径：picture/motion/e213E89/pic.jpg
     */
    protected function uploadPic($file, $ctrlName = 'public', $lat = 0, $lon = 0, $size = 1048576, $type = 'image/jpeg|image/png') {
        if (empty($file))
            return false;
        if ($file["error"] > 0)
            $this->returnJson(0, '上传文件出错，请稍后重试');
        if ($file['size'] > $size)
            $this->returnJson(0, '上传的文件不能超过' . $size . '字节，请重新选择文件');

        $ext = explode('.', $file["name"]);
        $format = $ext[1];
        $filename = md5($ext[0] . time()) . '.' . $format;
        $Imgpath = dirname($_SERVER['SCRIPT_FILENAME']) . '/upload/picture/' . $ctrlName . '/' . md5($lat . $lon) . '/' . $filename;
        $pagepic = 'picture/' . $ctrlName . '/' . md5($lat . $lon) . '/' . $filename;
        if (!is_dir(dirname($Imgpath))) {
            @mkdir(dirname($Imgpath), 0777, true);
        }
        if (!move_uploaded_file($file["tmp_name"], $Imgpath))
            $this->returnJson(0, '移动文件至指定文件夹失败');
        return $pagepic;
    }

}