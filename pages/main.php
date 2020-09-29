<?php
require_once ('../overrides.php');
require_once ('../functions.php');
$products = read_json_file('../database/products.json');
$categories = read_json_file('../database/categories.json');
$categories_with_products = [];

foreach ($categories as $category) {
    $category['products'] = [];
    foreach ($products as $product) {
        if ($category['id'] === $product['category_id']) {
            $category['products'][] = $product;
        }
    }
    $categories_with_products[] = $category;
}

$products_rand = get_random_product($products);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Асортимент Сумної</title>
    <meta charset="utf-8">
    <style>
        table {
            margin: auto;
        }
    </style>
     <link rel="stylesheet" href="/resourcses/css/main.css" />
</head>
<header>
<caption></caption>
</header>
<body>
   <div class="child">
    <?php
    foreach ($categories_with_products as $category) { ?>
        <h1><a href="/pages/category.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></h1>
            <div class="child">
                <?php
                foreach ($category['products'] as $product) {  ?>
                  
                        <a href="/pages/product.php?id=<?= $product['id'] ?>"><?= $product['name'] ?> </a>
                        <?= $product['price'] ?>
                        <img src="/resourcses/images/<?= $product['photo'] ?>" ? width="100" height="100"> 
                <?php } ?>
                </div>
                </div>
    <?php }
    ?>
    <div>
        <div><?= $products_rand['name'] ?> </div>
        <div><img src="<?= $products_rand['photo'] ?>" width="500" height="500"></div>
        <div><?= $products_rand['price'] ?> </div>
    </div>
</body>
<footer>
<div class="container">

</div></footer>
</html>