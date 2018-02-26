<?php
/***************************************************************************
 *
 * Copyright (c) 2018 github.com, Inc. All Rights Reserved
 * python/golang/php  AES/CBC/PKCS7Padding
 * Author scloudrun
 *
 **************************************************************************/

class AesCrypt {
    private $cipher = MCRYPT_RIJNDAEL_128;
    private $mode = MCRYPT_MODE_CBC;
    private $secret_key = '';
    private $iv = '0000000000000000';

    public function setCipher($cipher=''){
        $cipher && $this->cipher = $cipher;
    }

    public function setMode($mode=''){
        $mode && $this->mode = $mode;
    }

    public function setSecretKey($secret_key=''){
        $secret_key && $this->secret_key = $secret_key;
    }

    public function setIv($iv=''){
        $iv && $this->iv = $iv;
    }

    public function encrypt($str)
    {       
        $str = $this->pkcs7Pad ( $str, 16);
        $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->secret_key, $str, MCRYPT_MODE_CBC, $this->iv);
        $enc = base64_encode($encrypted);
        return $enc;
    }

    public function decrypt($str)
    {
        $encryptedData = base64_decode($str);
        $dec = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->secret_key, $encryptedData, MCRYPT_MODE_CBC, $this->iv),"\0");
        $dec = $this->pkcs7Unpad( $dec );
        return $dec;
    }

    private function hex2bin($hexData)
    {
        $binData = "";
        for($i = 0; $i < strlen ( $hexData ); $i += 2)
        {
            $binData .= chr(hexdec(substr($hexData, $i, 2)));
        }
        return $binData;
    }

    private function pkcs7Pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen ( $text ) % $blocksize);
        return $text . str_repeat ( chr ( $pad ), $pad );
    }

    private function pkcs7Unpad($text)
    {
        $pad = ord ( $text {strlen ( $text ) - 1} );
        if ($pad > strlen ( $text ))
            return false;
        if (strspn ( $text, chr ( $pad ), strlen ( $text ) - $pad ) != $pad)
            return false;
        return substr ( $text, 0, - 1 * $pad );
    }
}

