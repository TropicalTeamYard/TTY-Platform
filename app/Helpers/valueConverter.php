<?php

/**
 * 定义加密密码的方式
 * @param string $value
 * @return string
 */
function encryptPassword(string $value){
    return md5(encrypt($value));
}
