<?php

namespace Rusla\Generators\Generator;

use function fclose;
use function fgets;
use function fopen;
use function rand;
use function random_int;
use function time_nanosleep;

class PostProvider
{
    public function loadPosts()
    {
        $fn = fopen('posts_file.json', 'rb');
        while ($line = fgets($fn)){
//imitation API
            time_nanosleep(1, random_int(20_000_000, 40_000_000));
            yield $line;
        }
        fclose($fn);
    }
}
