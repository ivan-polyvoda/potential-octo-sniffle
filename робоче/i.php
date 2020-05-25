
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// $a = json_decode(file_get_contents('../main.json'), true);
// echo"<pre>"; print_r($a); echo"</pre>";
// // echo array_search(,$a, true);
// $a = [
//     "arr1" => [
//         "id" => 1,
//         "name" => "bread",
//         "category_id" => 1
//     ],
//     "arr2" => [
//         "id" => 1,
//         "name" => "list",
//         "category_id" => 5
//     ],
//     "arr3" => [
//         "id" => 1,
//         "name" => "kek",
//         "category_id" => 2
//     ],
//     "arr4" => [
//         "id" => 1,
//         "name" => "izi",
//         "category_id" => 3
//     ],  "arr5" => [
//         "id" => 1,
//         "name" => "voll",
//         "category_id" => 5
//     ]
// ];
// echo "before foreach <pre>";
// print_r($a);
// echo "</pre>";
// foreach ($a as $b) {
//     if ($b['category_id'] !== 5) {
//         unset($b);
//     };
//     echo "inside foreach: key is $key, value is $value <pre>";
//     print_r($b);
//     echo "</pre>";
// };

// // print_r($b);
// // foreach ($a['array1'] as $a_key => $b) {
// //     if ($a['category_id'] !== 2){
// //         unset($a[$a_key]);}

// // };
// // print_r($b);
?>

<?php
function reads ($file){
    $open_file = fopen($file, "r");
    if ($open_file === false) {
        return false;
    } 
    $buffer = "";
    while($line = fgets($open_file)){
     $buffer = $buffer . $line;
    }
    fclose($open_file);
    return $buffer;
}
$f = "/mnt/f/Cataloge Sumna/робоче/file.txt";
var_dump (reads($f));
// var_dump(file_get_contents("/mnt/f/Cataloge Sumna/робоче/file223.txt"));

?>
1. 
pars resource id
буде перевіряти ід продуктів.
функція прийматиме 1 аргумент і цей аргумент буде назвою параметру в урлі в якому зберігається айді
випадок коли значення знайдено привести це значення до цілого (Int) and return.
коли не знайдено - повернути null

2.find by id 
аргументи
1 - значенн айді з урла
2 - яку небудть колекцію(масив асоціативних масивів);
якщо елемент з таким айді існує в колекції то ми повертаємо цілий асоціативний масив
 якщо немає  - null;
<?php 
 function read_json_file($json_path) {
return json_decode(file_get_contents($json_path), true);
 } 