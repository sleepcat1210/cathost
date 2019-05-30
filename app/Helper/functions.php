<?php

/* * *********递归方式获取上下级权限信息*************** */

function getTree($data, $pId,$level=0)
{
    static $tree =[];
    foreach($data as $k => $v)
    {
        if($v['pid'] == $pId)
        {      
               $v['level'] =$level;
               $tree[] = $v;              
               getTree($data, $v['id'],$level+1); 
                unset($data[$k]);
        }
    }
    return $tree;
}

/***********递归方式获取上下级权限信息****************/

