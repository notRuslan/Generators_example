<?php

namespace Rusla\Generators;

use Rusla\Generators\Oop\ListProcessor;
use Rusla\Generators\Oop\PostProvider;
use function json_decode;
use function printf;
use function str_repeat;
use const PHP_EOL;

class Functional
{
    public function run():void
    {
        $postProvider = new PostProvider();
        $posts = $postProvider->loadPosts();
        $posts = ListProcessor::map(static fn($json): object => json_decode($json), $posts);
        $posts = ListProcessor::filter(static fn($post): bool => $post->userId > 9, $posts);
        $this->print($posts);
}

    public function print(array $posts): void
    {
        print("User ID | Id | Title" . PHP_EOL);
        print(str_repeat('-', 110) . PHP_EOL);
        foreach ($posts as $post){
            printf("%2d | %s" . PHP_EOL, $post->userId, $post->title);
        }
}

}
