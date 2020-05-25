<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$products = json_decode(file_get_contents('/mnt/f/cataloge sumna/main.json'), true);
// echo "<pre>"; print_r($products); echo "</pre>";
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
// echo "<pre>";
// print_r($categories);
// echo "</pre>";
// die;

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
        <h1><a href="/category.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></h1>
        <table>
            <caption>Сумна вівця</caption>
            <tbody>
                <?php
                foreach ($category['products'] as $product) {  ?>
                    <tr>
                        <td><a href="/product.php?id=<?= $product['id'] ?>"><?= $product['name'] ?> </a></td>
                        <td><?= $product['price'] ?></td>
                        <td><img src="<?= $product['photo'] ?>" ? width="100" height="100"> </td>
                        <td><?= $product['description'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php }
    ?>
</body>

</html>