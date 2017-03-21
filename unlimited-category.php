<?php
require("Category.php");
$categories = [];


$categories[0] = new Category(1, "category_1", 0);
$categories[1] = new Category(2, "category_2", 0);

$categories[2] = new Category(3, "category_1_3", 1);
$categories[3] = new Category(4, "category_1_4", 1);
$categories[4] = new Category(5, "category_2_5", 2);
$categories[5] = new Category(6, "category_1_6", 1);
$categories[6] = new Category(7, "category_2_7", 2);
$categories[7] = new Category(8, "category_4_8", 4);
$categories[8] = new Category(9, "category_5_9", 5);
$categories[9] = new Category(10, "category_9_10", 9);

$sortData = [];
$allCounts = count($categories);
// 先抽出一级分类。如果是从数据库取出来，最好先按parent_id升序排序
for ($i = 0, $j = $allCounts; $i < $j; $i++) {

    if ($categories[$i]->parent_id === 0) {
        $sortData[] = $categories[$i];
        unset($categories[$i]);
    }
}

sort($categories);

$sortCount = count($sortData);

function categoryRecursion(&$sortData, &$categories)
{
for($i = 0,$j = count($categories);$i < $j;$i++){
    if($sortData->id == $categories[$i]->parent_id) {
        $sortData->childCategories[] = $categories[$i];
        $count = count($sortData->childCategories) -1;
        categoryRecursion($sortData->childCategories[$count],$categories);

    }
}

}

for ($i = 0, $j = $sortCount; $i < $j; $i++) {
    categoryRecursion($sortData[$i], $categories, ($allCounts - $allCounts));
}

print_r(json_encode($sortData,JSON_FORCE_OBJECT));



