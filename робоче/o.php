<?php
$rows = 5;
    $cols = 3;

    $table = '<table border="1">';

    for ($tr = 1; $tr <= $rows; $tr++) {
        $table .= '<tr>';
        for ($td = 1; $td <= $cols; $td++) {
            $table .= '<td>'. bread . '</td>';
        }
        $table .= '</tr>';
    }

    $table .= '</table>';
    echo $table;

//////

    <!-- <?php
echo $_GET['product_id'];

?> -->

<?php
foreach ($category['products'] as $product) {  ?>
    <tr>
        <td><a href="/product.php?product_id=<?= $product['product_id'] ?>"><?= $product['name'] ?> </a></td>
        <td><?= $product['price'] ?></td>
        <td><img src="<?= $product['photo'] ?>" ? width="100" height="100"> </td>
        <td><?= $product['description'] ?></td>
    </tr>
<?php } ?>



<?php
if (count($category['products']) !== 0) {
    $random_product_index = rand(0, count($category['products']) - 1);
    $product = $category['products'][$random_product_index]; ?>
    <tr>
        <td><a href="/product.php?product_id=<?= $product['product_id'] ?>"><?= $product['name'] ?> </a></td>
        <td><?= $product['price'] ?></td>
        <td><img src="<?= $product['photo'] ?>" ? width="100" height="100"> </td>
        <td><?= $product['description'] ?></td>
    </tr>
<?php }
?>