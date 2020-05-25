<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function read_json_file($json_path) {
    return json_decode(file_get_contents($json_path), true);
     } 
if (isset($_GET['id'])) {
    $current_product_id = (int) $_GET['id'];
} else {
    die('Сторінка не знайдена');
}
$products = read_json_file('./main.json');
$categories = read_json_file('./categories.json');
$current_product_index = array_search($current_product_id, array_column($products, 'id'));
if ($current_product_index !== false) {
    $current_product = $products[$current_product_index];
} else {
    $current_product = NULL;
}
// $comments_write = json_encode(file_put_contents($comments));
$comments = read_json_file('./comments.json');
$errors = [];
if (isset($_POST['comment-submit'])) {
    if (empty($_POST['comment'])) {
        $errors[] = "Поле коментаря пусте";
    }
    // перевірка емейлу
    if (empty($_POST["email"])) {
        $errors[] = "Поле емейлу пусте";
    }
    if (empty($errors)) {
        $comments_array = [
            "id" => count($comments) + 1,
            "name" => $_POST["author"],
            "email" => $_POST["email"],
            "date" => date("d-m-Y"),
            "comment" => $_POST["comment"],
            "product_id" => $current_product_id
        ];
        $comments[] = $comments_array;
        file_put_contents('./comments.json', json_encode($comments));
    }
}
$comments_to_display = [];
foreach ($comments as $comment) {
    if ($comment["product_id"] === $current_product_id) {
        $comments_to_display[] = $comment;
    }
}
// echo "<pre>";
// print_r($);
// echo "</pre>";
?>


<!DOCTYPE html>
<html>

<head>
    <title>Асортимент Сумної</title>
    <meta charset="utf-8">

</head>

<body>
    <caption>Сумна вівця</caption>
    <table>
        <?php
        if ($current_product !== NULL) { ?>
            <h2><?= $current_product['name']; ?></h2>
            <tbody>
                <?php
                foreach ($products as $product) {
                    if ($product['id'] !== $current_product['id']) {
                        continue;
                    }
                ?>
                    <tr>
                        <td>
                            <p><img src="<?= $product['photo'] ?>" width="500" height="500"></p>
                        </td>
                        <td width="50" height="50">
                            <p><?= $product['description'] ?></p>
                        </td>
                        <td><?= $product['price'] ?> грн.</td>
                    </tr>
                <?php } ?>
            </tbody>
    </table>
<?php } else { ?>
    <h2>'Такого продукту немає'</h2>
<?php } ?>

<!--Блок запису-->
<div id="coments_id">
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" name="coments" method="POST">
        <div class="comment_area">
            <ul>
                <li style="display: inline">
                    <label for="author">Ім'я</label>
                    <input type="text" name="author" value="" size="10" tabindex="1">
                </li>
                <li style="display: inline">
                    <label for="email">e-mail</label>
                    <input type="text" name="email" id="email" value="" size="10" tabindex="1">
                </li>
            </ul>
        </div>
        <div>
            <p><textarea name="comment" cols="80" rows="5"></textarea></p>
            <p>
                <input type="submit" name="comment-submit" value="Відправити">
            </p>
        </div>
    </form>
    <ul>
        <?php foreach ($errors as $error_text) { ?>
            <li><?= $error_text ?></li>
            <?php } ?>
    </ul>
</div>
<!--Блок відображення-->
<?php
foreach ($comments_to_display as $comment) { ?>
    <div class="box_visible">
        <ol id="thecomments">
            <span></span>
            <div><?= $comment['name'] ?></div>
            <span class="date"><?= $comment['date'] ?></span>
            <div class="comment_text"><?= $comment['comment'] ?></div>
        </ol>
    </div>
<?php } ?>
</body>

</html>