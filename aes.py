#! /usr/bin/env python
# -*- coding: utf-8 -*-
# vim:fenc=utf-8

#############################################################################
# 
# Copyright (c) 2018 github.com, Inc. All Rights Reserved
# python/golang/php  AES/CBC/PKCS7Padding
# Author scloudrun
# 
############################################################################

from Crypto.Cipher import AES
import base64

def getAesData(key,body):
    BS = 16
    pad = lambda s: s + (BS - len(s) % BS) * chr(BS - len(s) % BS)
    unpad = lambda s : s[0:-ord(s[-1])]

    PADDING = '\0'
    pad_it = lambda s: s+(16 - len (s)%16)*PADDING
    iv = '0'*16

    generator = AES.new(key, AES.MODE_CBC, iv)
    crypt = generator.encrypt(pad(body))
    cryptStr = base64.b64encode(crypt)
    return cryptStr

if __name__ == "__main__":
    sk  = '45f8c3dfbca782b4cd8a34f54f08c2bd'
    str = 'aes_encrypt_decrypt_cross_language'
    res = getAesData(sk,str)
    print 'encrypt base64 string:\t'+res

