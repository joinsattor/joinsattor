
<?php

$token = 'Bu Yerga Botimiz Tokenini Kiritamiz';


function bot($method,$datas=[]){
global $token;
    $url = "https://api.telegram.org/bot".$token."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

function del($nomi){
   array_map('unlink', glob("$nomi"));
   }

   function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }


$update =
json_decode(file_get_contents('php://input'));
$xabar = $update->message;
$text = $message->text;
$cid = $message->chat->id;


if($text=="/start"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Salom",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Salom","callback_data"=>"hi"]],
]]),
]);
}
