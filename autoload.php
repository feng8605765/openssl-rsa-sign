<?php

spl_autoload_extensions(".php");

$path = __DIR__;

set_include_path($path);

spl_autoload_register();

