<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

// Instantiate post
$category = new category($db);

// Blog post query
$result = $category->read();
// Get the row count
$num = $result->rowCount();

if($num > 0){
    $category_array['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $category_item = array(
            'id' => $id,
            'name' =>$name,
            'create_at' => $create_at,
            
        );
        array_push($category_array['data'], $category_item);
    }
    // Convert to json 
    echo json_encode($category_array);
}else{
    echo json_encode(array('message' => 'No category found.'));

}