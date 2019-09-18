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


if ($username == "@aleproscia") {
	$res = "Alterego, ti va una birra???";
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $res);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
}

if($text == "/cosaamo"){
	$res =  "La birra!!!!!!";
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $res);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
}

if($text == "/slotmachine"){
	$res =  "din din din din din din din din din din";
	header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $res, "photo" => "https://media2.giphy.com/media/26BRFrAgGF6wtebio/giphy.gif" );
	$parameters["method"] = "sendPhoto";
	echo json_encode($parameters);
}

