<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

// Instantiate post
$post = new Post($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();

$post->read_single();


$post_array = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name,

);

if(!empty($post_array)) {
    echo json_encode($post_array);
}
