
<?php
#========t.me/ssx_official=========#

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


//inline_uchun_methodlar
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;


//oddiy_knopka_uchun_methodlar

$xabar = $update->message;
$xabar_id = $xabar->message_id;
$chat_id = $xabar->chat->id;
$text = $xabar->text;




if($text=="/start"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"Assalomu Aleykum",
]);
}

