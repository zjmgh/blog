<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 9:49
 * 分页操作
 */
//设置参数
/*
 * 参数 page
 * 参数 pageCount
 * 参数 offSet
 */
function page($totalNum,$page=1,$pageSize=10){
    if(empty($page)){
        $page = 1;
    }else{
        if($page<1){
            $page = 1;
        }else{
            $page = intval($page);
        }
    }
    //确定当前页
    $pageCount = ceil($totalNum/$pageSize);
    //总页数
    if($page>$pageCount){
        if($pageCount==0){
            $page =1;
        }else{
            $page = $pageCount;
        }

    }
    $offSet = ($page-1)*$pageSize;
    //偏移量
    $data = array(
        'offSet'=>$offSet,
        'pageCount'=>$pageCount,
        'page'=>$page
    );
    return $data;
}
//设置分页标签
function setPageLabel($totalNum,$pageSize,$page,$pageCount){
    if($totalNum>$pageSize){
        $first = 1;
        echo "<a href=?page=".$first.">首页</a>&nbsp;";
        if($page == 1){
            echo "上一页&nbsp;";
        }else{
            echo "<a href=?page=".($page-1).">上一页</a>&nbsp;";
        }
        echo $page."&nbsp;";
        if($page >= $pageCount){
            echo "下一页&nbsp;";
        }else{
            echo "<a href=?page=".($page+1).">下一页</a>&nbsp;";
        }
        echo "<a href=?page=".$pageCount.">尾页</a>&nbsp;";
    }
}
