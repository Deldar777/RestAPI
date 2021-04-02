<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headres: Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');



include_once('../core/initialize.php');

$post = new Post($db);

$post->id = 14;
$post->title = 'Motorcycles';
$post->body = 'Good motors';
$post->author = 'Lemstra Motoren';
$post->category_id = 1;


// Create post

if($post->update()){
    echo json_encode(array("message" => 'Post updated'));
}else{
    echo json_encode(array("message" => 'Post not updated'));
}