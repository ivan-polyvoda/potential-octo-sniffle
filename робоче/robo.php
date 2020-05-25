<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$products = json_decode(file_get_contents('./main.json'), true);
// echo "<pre>"; print_r($products); echo "</pre>";
$categories = json_decode(file_get_contents('/mnt/f/cataloge sumna/categories.json'), true);
// echo "<pre>"; print_r($categories); echo "</pre>"
foreach ($categories as &$category) {
    $category['products'] = [];
    foreach ($products as $product) {
        if ($category['products'] === $product['category_id']) {
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
    <style>
        table {
            width: "100%";
            margin: auto;
        }
    </style>
</head>

<body>

    <div class="search-bar">
        <select>
            <option selected="selected">Всі категорії</option>
            <option>Листівки</option>
            <option>Еко торби</option>
            <option>Закладки</option>
            <option>Планівники</option>
        </select><br />
        <form><br />
            <input name="search" placeholder="Пошук продукців" type="search">
            <button class="butnn">Пошук</button>
        </form><br />
    </div>

    <?php
    foreach ($categories as $category) { ?>
        <h1><?= $category['name'] ?></h1>
        <table>
            <caption>СУМНА ВІВЦЯ</caption>
            <thead>
                <tr>
                    <th>АСОРТИМЕНТ СУМНОЇ</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($category['products'] as $product) {  ?>
                <tr>
                    <td><a href="/product.php?product_id=<?= $product['product_id'] ?>"><?= $product['name'] ?> </a></td>
                    <td><?= $product['price'] ?></td>
                    <td><img src="<?= $product['photo'] ?>" ? width="100" height="100"> </td>
                    <td><?= $product['description'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</body>

</html>