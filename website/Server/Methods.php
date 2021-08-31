<?php

namespace Server;
ini_set ('display_errors', 1);
error_reporting(E_ALL);
use Server\Core\EnumConst;
use Server\Core\QueryBuilder;
use Server\Core\Server;

if (!defined('AppiEngine')) {
    header( "refresh:0; url=/");
}

/**
 * Blocks
 */
class Methods
{

}