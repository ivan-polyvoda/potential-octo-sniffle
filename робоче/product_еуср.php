<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$products = json_decode(file_get_contents('/mnt/f/cataloge sumna/main.json'), true);
echo "<pre>"; print_r($products); echo "</pre>";
$categories = json_decode(file_get_contents('/mnt/f/cataloge sumna/categories.json'), true);
foreach ($categories as &$category) {
    $category['products'] = [];
    // echo "<pre>";
    // print_r($category);
    // echo "</pre>"; die;
    foreach ($products as $product) {
        if ($category['id'] === $product['category_id']) {
            $category['products'][] = $product;
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Асортимент Сумної</title>
    <meta charset="utf-8">

</head>

<body>
    <table>
        <caption>Сумна вівця</caption>
        <thead>
            <tr>
                <th>
                    <h1>Еко Торби</h1>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($products as $category['product']) {
                // echo "<pre>";
                // print_r($product);
                // echo "</pre>"; 
            ?>
                <tr>
                    <td><a href="/product.php?product_id=<?= $product_id['product_id'] ?>"><?= $product['name'] ?> </a></td><br />
                    <td><?= $product['price'] . "грн" ?></td><br />
                    <td><img src="<?= $product['photo'] ?>" ? width="300" height="300"> </td><br />
                    <td><?= $product['description'] ?></td><br />
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</body>

</html>