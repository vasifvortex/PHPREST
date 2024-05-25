<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET,POST,PUT,PATCH,DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

//initialize our API
include_once('../core/initialize.php');

//instantiate post(give example)
$post = new Post($db);
//blog post querry
$result = $post->read();
//get row count
$num = $result->rowCount();
if($num > 0){
    $post_arr = array();
    $post_arr['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'id'    => $id,
            'name'     => $name,
            'type'  => $type,
            'price' => $price,
            'comment' => $comment,
            'image' => $image
        );
        array_push($post_arr['data'], $post_item);
    }
    //convert to JSON and output
    echo json_encode($post_arr);

}else{
    echo json_encode(array('message' => 'No post found.'));
}
