<?php
/**
 * Created by PhpStorm.
 * User: dimscode
 * Date: 17/01/18
 * Time: 9:35
 */

namespace app\assets;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;

class HtmlDumperCustom extends HtmlDumper
{
    public $styles = array(
        'default' => 'background-color:transparent; margin:5px auto; color:#000; line-height:1.2em; font:14px Menlo, Monaco, Consolas, monospace; word-wrap: break-word; white-space: pre-wrap; position:relative; z-index:99999; word-break: break-all',
        'num' => 'font-weight:bold; color:#1299DA',
        'const' => 'font-weight:bold',
        'str' => 'font-weight:bold; color:#56DB3A',
        'note' => 'color:#1299DA',
        'ref' => 'color:#A0A0A0',
        'public' => 'color:#000',
        'protected' => 'color:#000',
        'private' => 'color:#000',
        'meta' => 'color:#B729D9',
        'key' => 'color:#56DB3A',
        'index' => 'color:#1299DA',
        'ellipsis' => 'color:#FF8400',
    );
}