<?php

namespace Rusla\Generators\Generator;

use function array_filter;
use function array_map;
use const PHP_EOL;

class ListProcessor
{
    public static function map(callable $fn, iterable $data): iterable
    {
        foreach ($data as $item){
            echo __METHOD__ . PHP_EOL;
            yield $fn($item);
        }
    }

    public static function filter(callable $fn, iterable $data): iterable
    {
        foreach ($data as $item){
                echo __METHOD__ . PHP_EOL;
            if($fn($item)){
                yield $item;
            }
        }
    }

}
