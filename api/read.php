<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

// Instantiate post
$post = new Post($db);

// Blog post query
$result = $post->read();
// Get the row count
$num = $result->rowCount();

if($num > 0){
    $post_array['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'id' => $id,
            'title' =>$title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name
        );
        array_push($post_array['data'], $post_item);
    }
    // Convert to json 
    echo json_encode($post_array);
}else{
    echo json_encode(array('message' => 'No categories found.'));

}