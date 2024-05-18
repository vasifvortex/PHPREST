<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
//initialize our API
include_once('../core/initialize.php');

//instantiate post(give example)
$post = new Post($db);
//get raw posted data
$data = json_decode(file_get_contents("php://input"));
$post->id = $data->id;
$post->name = $data->name;
$post->type = $data->type;
$post->price = $data->price;
$post->comment = $data->comment;
$post->image = $data->image;
//create post
if($post->update()){
    echo json_encode(
        array('message'=> 'Post updated.')
    );
}else{
    echo json_encode(
        array('message'=> 'Post not updated')
    );
}
