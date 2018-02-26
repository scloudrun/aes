Aes encrypt and decrypt ,Cross language
================================

## Desc
~~~
support python,golang,php
~~~

## Usage

#### usage go
~~~
func main() {
	key := "45f8c3dfbca782b4cd8a34f54f08c2bd"
	str := "aes_encrypt_decrypt_cross_language"
	enc, err := AesEncrypt([]byte(str), []byte(key))
	if err == nil {
		encodeString := base64.StdEncoding.EncodeToString(enc)
		fmt.Println("encrypt base64 string:",encodeString)
	} else {
		fmt.Println("err:", err)
	}
}
~~~

#### usage php
~~~
$key = "45f8c3dfbca782b4cd8a34f54f08c2bd";
$str = "aes_encrypt_decrypt_cross_language";
$encrypt = new AesCrypt();
$encrypt->setSecretKey($key);
$enc = $encrypt->encrypt($str);
echo $enc."\n\n";
$dec = $encrypt->decrypt("$enc");
echo $dec."\n\n";
?>
~~~

#### usage python
~~~
sk  = '45f8c3dfbca782b4cd8a34f54f08c2bd'
str = 'aes_encrypt_decrypt_cross_language'
res = getAesData(sk,str)
print 'encrypt base64 string:\t'+res
~~~

Contributing
============

Please feel free to submit issues, fork the repository and send pull requests!
