<?php
require_once ('../overrides.php');
require_once ('../functions.php');
$products = read_json_file('../database/products.json');
$categories = read_json_file('../database/categories.json');
$current_category_id = parse_resource_id($_GET, "id");
// var_dump($current_category_index);
$current_category = find_by_id($current_category_id, $categories);

// echo "<pre>";
// print_r($current_category);
// echo "</pre>";

?>
<!DOCTYPE html>
<html>

<head>
    <title>Асортимент Сумної</title>
    <meta charset="utf-8">
</head>

<body>
    <caption>СУМНА ВІВЦЯ</caption>

    <?php
    if ($current_category !== NULL) {
    ?>
        <h2><?= $current_category['name']; ?></h2>
        <table>

            <tbody>
                <?php foreach ($products as $product) {
                    if ($product['category_id'] !== $current_category['id']) {
                        continue;
                    }
                ?>
                    <tr>
                        <td><a href="/pages/product.php?id=<?= $product['id'] ?>"><?= $product['name'] ?> </a></td>
                        <td><?= $product['price'] ?></td>
                        <td><img src="/resourcses/images/<?= $product['photo'] ?>" ? width="100" height="100"></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h2>Такої категорії немає! </h2>
    <?php } ?>
</body>

</html>