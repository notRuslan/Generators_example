<?php

namespace Rusla\Generators;

use Rusla\Generators\Generator\ListProcessor;
use Rusla\Generators\Generator\PostProvider;

class GeneratorWay
{
    public function run(): void
    {
        $postProvider = new PostProvider();
        $posts = $postProvider->loadPosts();
        $posts = ListProcessor::map(static fn($json): object => json_decode($json), $posts);
        $posts = ListProcessor::filter(static fn($post): bool => $post->id > 9, $posts);
//        $posts = ListProcessor::filter(static fn($post): bool => $post->userId > 9, $posts);
        $this->print($posts);
    }

    public function print(iterable $posts): void
    {
        print("User ID | Id | Title" . PHP_EOL);
        print(str_repeat('-', 110) . PHP_EOL);
        foreach ($posts as $post) {
//            printf("%2d | %2d | %s" . PHP_EOL, $post->id, $post->userId, $post->title);
        }
    }
}
