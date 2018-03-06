<?php
/*
 * 数据库连接文件
 */

function connect(){
    $config = include 'config.php';
    $link = @mysqli_connect($config['host'],$config['user'],$config['pwd'],$config['database']);
    if(!$link){
        exit("connect error:".mysqli_connect_error());
    }
    mysqli_query($link,"set names '{$config['code']}'");
    return $link;
}

//添加数据
function add($sql){
    $link =connect();//连接数据库服务器，选择当前数据库
    $result = @mysqli_query($link,$sql) or die(mysqli_error($link));
    if($result && mysqli_insert_id($link)){
        return true;
    }else{
        return false;
    }


}
//读取数据的方法,全部数据的方法
function get($tableName,$order='id asc'){
    $link = connect();
    $sql = "select * from {$tableName} order by {$order}";
    $result = @mysqli_query($link,$sql) or die(mysqli_error($link));
    while($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;//二维数组
}
//读取特定id的数据
function getId($tableName,$key='',$value='',$order='id asc'){
    $link = connect();
    $sql = "select * from {$tableName} where {$key}='{$value}' order by {$order}";
    $result = @mysqli_query($link,$sql) or die(mysqli_error($link));
    while($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;//二维数组
}
//读取数据的方法,单条数据的方法
function find($tableName,$key='',$value=''){//返回的是一维数组
    $link = connect();
    if(empty($key)){
        $sql = "select * from {$tableName} limit 1";
    }else{
        $sql ="select * from {$tableName} where {$key}='{$value}'";
    }

    $result = @mysqli_query($link,$sql) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    if(is_array($row)){
        return $row;
    }else{
        return 0;
    }
}
//删除数据的函数,依赖主键进行删除
function delete($tableName,$key='id',$value='1'){
    $link = connect();
    $sql ="delete from {$tableName} where {$key}='{$value}'";
    $result = @mysqli_query($link,$sql) or die(mysqli_error($link));
    if($result && mysqli_affected_rows($link)){
        return true;
    }else{
        return false;
    }
}

//数据修改函数
function save($sql){
    $link =connect();//连接数据库服务器，选择当前数据库
    $result = @mysqli_query($link,$sql) or die(mysqli_error($link));
    if($result){
        return true;
    }else{
        return false;
    }

}
//获取数据表总记录数
function getCount($tableName){
    $link = connect();
    $sql ="select * from {$tableName}";
    $result = mysqli_query($link,$sql);
    $count = mysqli_num_rows($result);
    return $count;
}

//根据id查询记录数
function showCount($tableName,$key='',$value=''){
    $link = connect();
    $sql ="select * from {$tableName} where {$key}='{$value}'";
    $result = mysqli_query($link,$sql);
    $count = mysqli_num_rows($result);
    return $count;
}



