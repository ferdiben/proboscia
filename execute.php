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

$text = trim($text);
$text = strtolower($text);


if (strtolower($username) === "aleproscia") {
	$res = "Alterego, ti va una birra???";
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $res);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
}

if(checkCommand("/cosaamo")){
	$res =  "La birra!!!!!!";
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $res);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
}

if(checkCommand("/slotmachine")){
	$res =  "din din din din din din din din din din";
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $res, "photo" => "https://proboscia.herokuapp.com/prosciato2.jpg" );
	$parameters["method"] = "sendPhoto";
	echo json_encode($parameters);
}

if($checkCommand("/slotmachine hippy"){
	$res =  "din din din din din din din din din din";
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $res, "photo" => "https://proboscia.herokuapp.com/prosciato.jpg" );
	$parameters["method"] = "sendPhoto";
	echo json_encode($parameters);
}


function checkCommand($cmd) {
    global $text;
    return substr($text, 0, strlen($cmd)) === $cmd;
}