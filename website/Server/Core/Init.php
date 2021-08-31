<?php
namespace Server\Core;
ini_set ('display_errors', 1);
error_reporting(E_ALL);
if (!defined('AppiEngine')) {
    header( "refresh:0; url=/");
}

/**
 * Init
 */
class Init
{
    public $config;

    public function initAppi() {
        $this->initCfg();
        $this->initRequest();

        session_start();

        if (!isset($_COOKIE['UTC'])) {
            setcookie("UTC", 0, 0x6FFFFFFF, "/", $_SERVER['HTTP_HOST'] . "");
        }

        return $this;
    }

    protected function initCfg() {
        $this->config = new Config;
        $this->config = $this->config->getAppiAllConfig()->getObjectResult();

        if ($this->config->displayErrors) {
            @error_reporting ( E_ALL ^ E_DEPRECATED ^ E_NOTICE );
            @ini_set ( 'error_reporting', E_ALL ^ E_DEPRECATED ^ E_NOTICE );
            @ini_set ( 'display_errors', true );
            @ini_set ( 'html_errors', false );
            error_reporting(E_ALL);
            ini_set("display_errors", 1);
        }
        if ($this->config->isWhiteIp) {
            if($_SERVER['REMOTE_ADDR'] != $this->config->whiteIp) {
                header('Location: https://test1.ru');
                die("<h1><center>test1.ru</center></h1>");
            }
        }

        return $this;
    }

    protected function initRequest() {
        return $this;
    }
}