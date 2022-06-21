<?php

declare(strict_types=1);

require_once "database.php";

$database = new SecureDatabase("localhost",
                               "franco_caredda",
                               "",
                               "foto_cartella",
                                NOONE);