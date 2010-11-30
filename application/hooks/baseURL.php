<?php
class baseurl_hook
{
    public function __construct()
    {
        $uri = "http://" . $_SERVER['HTTP_HOST'] . substr($_SERVER['PHP_SELF'], 0, strlen("sys/dispatcher.php") * -1);
        $GLOBALS['baseURL'] = $uri;
    }
}
