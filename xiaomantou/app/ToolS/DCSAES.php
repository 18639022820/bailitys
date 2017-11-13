<?php

namespace App\Tools;
class DCSAES{   
    static function decode($data) {
        $pk = "yum2017010203lanzexinxigongsi981";  
        $iv = substr("yum2017010203lanzexinxigongsi981",0,16);
       return  mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $pk, base64_decode(trim($data)), MCRYPT_MODE_CBC,$iv);
    }

    static function endcode($data){
        $pk = "yum2017010203lanzexinxigongsi981";
        $iv = substr("yum2017010203lanzexinxigongsi981", 0, 16);
        $encrypted = (mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $pk, trim($data), MCRYPT_MODE_CBC,$iv) );
        return  trim(base64_encode($encrypted));
    }
    
}