<?php
function parse_resource_id($request, $resource_name)
{

    if (isset($request[$resource_name])) {
        $resource_id = (int) $request[$resource_name];
        if ($resource_id !== 0) {
            return $resource_id;
        }
        return NULL;
    }
    return NULL;
}

function read_json_file($json_path)
{
    return json_decode(file_get_contents($json_path), true);
}

function find_by_key($key, $value, $collection)
{
    $current_index = array_search($value, array_column($collection, $key));
    if ($current_index !== false) {
        return $collection[$current_index];
    }
    return NULL;
}
function find_by_id($value, $collection)
{
    return find_by_key('id', $value, $collection);
}



function get_sibiling($products, $current_product_id, $direction)
{
    $products_ids = array_column($products, "id");
    $current_product_index = array_search($current_product_id, $products_ids);
    if ($current_product_index === NULL) {
        return NULL;
    }
    $target_product_index = $current_product_index + ($direction * 1);
    if (!isset($products[$target_product_index])) {
        if ($direction === -1) {
            return $products[count($products) - 1];
        }
        return $products[0];
    }
    return $products[$target_product_index];
}

function get_next_product($products, $current_product_id)
{
    return get_sibiling($products, $current_product_id, 1);
}

function get_previous_product($products, $current_product_id)
{
    return get_sibiling($products, $current_product_id, -1);
}

function get_category_products($category_id, $list_all_products)
{
    $category_products = [];
    foreach ($list_all_products as $product) {
        if ($product['category_id'] === $category_id) {
            $category_products[] = $product;
        }
    }
    return $category_products;
}


function get_random_product($product_list) // ["a" "B" "c"]
{
    $random_product = mt_rand(0, count($product_list) - 1);
    return $product_list[$random_product];
}
// $a = [21, 21, 33, 44, 51, 666];
// $v = (mt_rand(0, count($a) - 1));
// $b = $a[$v];
// print_r($b);
// die;
