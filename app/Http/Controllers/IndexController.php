<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class IndexController extends Controller {

    public function index() {
//        $data = array(
//            array('id' => 1, 'name' => '安徽', 'pid' => 0),
//            array('id' => 2, 'name' => '北京', 'pid' => 0),
//            array('id' => 3, 'name' => '海淀', 'pid' => 2),
//            array('id' => 4, 'name' => '中关村', 'pid' => 3),
//            array('id' => 5, 'name' => '合肥', 'pid' => 1),
//            array('id' => 6, 'name' => '上地', 'pid' => 3),
//            array('id' => 7, 'name' => '河北', 'pid' => 0),
//            array('id' => 8, 'name' => '石家庄', 'pid' => 7),
//        );
        $data=array(1,2,3,2,6,3,4,9,4,5,2);
//    var_dump($this->Tree($data));
        dd($this->myScandir("../../"));
//        dd($data);
    }

    /*
     * 无限分类
     */

    public function Tree($data, $pid = 0) {
        $tree = array();
        foreach ($data as $k => $v) {
            if ($v['pid'] == $pid) {
                $tree[$k] = $v;
//                unset($data[$k]);
                $tree[$k]['childer'] = $this->Tree($data, $v['id']);
            }
        }
        return $tree;
    }

    static public $intance;

    //单例
    static public function getInstance() {

        if (!self::instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
/*
 * 1 2 3 4
 *   2 3 4
 *   3 4
 *   4
 */
    //快速查找
    public function mPao($arr) {
        if (count($arr) < 1) {
            return $arr;
        }
        for ($i = 0; $i < count($arr); $i++) {
            $is_true=false;
            for ($j = 0; $j < count($arr) - $i; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $is_true=true;
                    $tem = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tem;
                }
            }
            if($is_true){
                break;
            }
        }
        return $arr;
    }
    /*
     * 二叉树
     */
    public function quickSort($arr){
        $length=count($arr);
        if($length<=1){
            return  $arr;
        }
        $base_num=$arr[0];//标尺
        $left=array();
        $right=array();
        for($i=1;$i<$length;$i++){
            if($base_num>$arr[$i]){
                $left[]=$arr[$i];
            }
            if($base_num<$arr[$i]){
                $right[]=$arr[$i];
            }
        }
        $left=  self::quickSort($left);
        $right=self::quickSort($right);
        return array_merge($left,array($base_num),$right);
    }
    //遍历文件
    public function myScandir($dir){
        $files=array();
        if($handle=  opendir($dir)){//打开资源
            while(($file=readdir($handle))!==false){//读
                if($file!='.'&&$file!='..'){
                    if(is_dir($dir."/".$file)){//判断是不是
                        $files[$file]=self::myScandir($dir."/".$file);
                    }else{
                        $files[]=$file;
                    }
                }
            }
            closedir($handle);//关闭资源
            return $files;
        }
    }

}
