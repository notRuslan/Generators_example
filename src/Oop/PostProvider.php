<?php

namespace Rusla\Generators\Oop;

use function fclose;
use function fgets;
use function fopen;

class PostProvider
{
    public function loadPosts()
    {
        $posts = [];
        $fn = fopen('posts_file.json', 'rb');
        while ($line = fgets($fn)){
            $posts[] = $line;
        }
        fclose($fn);
        return $posts;
    }
}
