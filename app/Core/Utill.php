<?php
namespace App\Core;

class Utill{
    public static $crudModules = [
        'unit',
        'user',
        'mother_vessel',
    ];
    public static function perPageItem(){
        return 20;
    }
}