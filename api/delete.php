<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headres: Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');



include_once('../core/initialize.php');

$post = new Post($db);

$post->id = 14;

// Create post

if($post->delete()){
    echo json_encode(array("message" => 'Post deleted'));
}else{
    echo json_encode(array("message" => 'Post not deleted'));
}