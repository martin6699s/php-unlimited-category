<?php
$categories = array(
    array('id'=>1,'name'=>'电脑','pid'=>0),
    array('id'=>2,'name'=>'手机','pid'=>0),
    array('id'=>3,'name'=>'笔记本','pid'=>1),
    array('id'=>4,'name'=>'台式机','pid'=>1),
    array('id'=>5,'name'=>'智能机','pid'=>2),
    array('id'=>6,'name'=>'功能机','pid'=>2),
    array('id'=>7,'name'=>'超级本','pid'=>3),
    array('id'=>8,'name'=>'游戏本','pid'=>3),
    array('id'=>9,'name'=>'游戏本01','pid'=>8),
    array('id'=>10,'name'=>'游戏本02','pid'=>9),
    array('id'=>11,'name'=>'游戏本0233','pid'=>0),
    array('id'=>12,'name'=>'游戏本023332','pid'=>11),
);

$tree = array();
//第一步，将分类id作为数组key,并创建children单元
foreach($categories as $category){
    $tree[$category['id']] = $category;
    $tree[$category['id']]['children'] = array();
}

//第二部，利用引用，将每个分类添加到父类children数组中，这样一次遍历即可形成树形结构。
foreach ($tree as $k=>$item) {
    if ($item['pid'] != 0) {
        $tree[$item['pid']]['children'][] = &$tree[$k];
    }
}

$categories = [];
foreach ($tree as $item){
    if($item['pid'] == 0){
        $categories[] = $item;
    }
}
print_r(json_encode($categories));