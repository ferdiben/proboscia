<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}


$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$from = $message['chat']['from']['username'];
$from = trim($from);
$from = strtolower($from);
$text = trim($text);
$text = strtolower($text);
$lastname = trim($lastname);
$lastname = strtolower($lastname);



if(strpos($text, "setting") !== false){
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $lastname);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
}

if (strpos($from, "raciopbot") !== false && rand(0,10) % 3 == 0) {
	$res = "Zitto, stupido bot!!!!!";
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $res);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
}

if(strpos($text, "/cosaamo") !== false){
	$res =  "La birra!!!!!!";
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $res);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
}

if(strpos($text, "/slotmachine") !== false){
	$res =  "din din din din din din din din din din";
	header("Content-Type: application/json");
	if(strpos($text, "hippy") !== false){
		$parameters = array('chat_id' => $chatId, "text" => $res, "photo" => "https://proboscia.herokuapp.com/prosciato.jpg" );
	} else {
		$parameters = array('chat_id' => $chatId, "text" => $res, "photo" => "https://proboscia.herokuapp.com/prosciato2.jpg" );
	}
	$parameters["method"] = "sendPhoto";
	echo json_encode($parameters);
}

if(strpos($text, "/guglielmotell") !== false){
	$res =  "La birra!!!!!!";
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "video" => "https://proboscia.herokuapp.com/tell.mp4");
	$parameters["method"] = "sendVideo";
	echo json_encode($parameters);
}








