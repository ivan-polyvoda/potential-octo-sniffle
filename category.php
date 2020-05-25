<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['id'])) {
    $current_category_id = (int) $_GET['id'];
} else {
    die('Сторінка не знайдена');
}

$products = json_decode(file_get_contents('./main.json'), true);
$categories = json_decode(file_get_contents('./categories.json'), true);
$current_category_index =  array_search($current_category_id, array_column($categories, 'id'));
// var_dump($current_category_index);
if ($current_category_index !== false) {
    $current_category = $categories[$current_category_index];
} else {
    $current_category = NULL;
}
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
                        <td><a href="/product.php?id=<?= $product['id'] ?>"><?= $product['name'] ?> </a></td>
                        <td><?= $product['price'] ?></td>
                        <td><img src="<?= $product['photo'] ?>" ? width="100" height="100"></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h2>Такої категорії немає! </h2>
    <?php } ?>
</body>

</html>