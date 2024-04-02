<?php
namespace Controllers\Base;

require_once '../../vendor/autoload.php';

class BaseController
{
    function __construct()
    {
        header('Content-Type: application/json;charset=utf-8;');
    }

    public function useAuth()
    {
        $headers = getallheaders();
        if (in_array('Authorization', $headers))
            return true;
        return false;
    }
}