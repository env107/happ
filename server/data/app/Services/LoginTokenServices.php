<?php
namespace App\Services;

class LoginTokenServices
{
     //获取token
     public  function take($payload,$key,$alg = "SHA256"){
        if(empty($key)){
            return false;   
        }
        $key = md5($key);       
        //编码头信息
        $headerString = base64_encode(json_encode(array(
            'typ'=>'JWT',
            'alg'=>$alg
        )));
        //编码载荷信息
        $payloadString = base64_encode(json_encode($payload));
        $jwt = $headerString.".".$payloadString;
        //返回token
        return $jwt.".".($this->signature($jwt,$key,$alg));
    }

    //获取payload
    public function getPayload($token,$key,$alg = "SHA256"){
        if(empty($key) || empty($token)){
           
            return false;
        }
        $key = md5($key);
        $tokens = explode(".",$token);
      
        if(empty($tokens) || count($tokens) != 3){
            // var_dump($tokens);exit;
            return false;
        }
        //解码
        list($header64,$payload64,$signature64) = $tokens;
        $header = json_decode( base64_decode($header64) ,true);
      
        //验证
        if(empty($header['alg'])){
            return false;
        }
        $jwt = $header64.".".$payload64;
    
        $result = $this->($jwt,$key,$header['alg']) === $signature64;
      
        if($result === FALSE) return false;
        $payload = json_decode(base64_decode($payload64),true);
       
        $time = time();
        if($time - $payload['logtime'] > 120){
            return false;
        }
   
        
        return $payload;
    }

    public  function signature($input,$key,$alg){
        return hash_hmac($alg,$input,$key);
    }
}