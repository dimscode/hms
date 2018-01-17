<?php

namespace app\assets;

use \Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use app\assets\HtmlDumperCustom;

class Dumper
{
    public function dump($value)
    {
        $dumper = in_array(PHP_SAPI, ['cli', 'phpdbg']) ? new CliDumper : new HtmlDumperCustom;
        $dumper->dump((new VarCloner)->cloneVar($value));
    }
}