<?php
/**
 * Fast - fast create difficult to grow/evaluate
 */
namespace Rusla\Generators;
use function count;
use function fclose;
use function file_get_contents;
use function fopen;
use function fwrite;
use function json_decode;
use function json_encode;
use function printf;
use function var_dump;
use const JSON_THROW_ON_ERROR;
use const PHP_EOL;

class Fast {
    public function run(): void
    {


        print("User ID | Id | Title" . PHP_EOL);
        print(str_repeat('-', 110) . PHP_EOL);
        $fn = fopen('posts_file.json', 'rb');
        while ($line = fgets($fn)){
            $data = json_decode(
                $line,
                false,
                512,
                JSON_THROW_ON_ERROR
            );
            if($data->userId > 9){
                printf("%2d | %s" . PHP_EOL, $data->userId, $data->title);
            }
        }
        fclose($fn);
    }


    public function createFileData()
    {
        $data = file_get_contents('posts.json');
        $data = json_decode($data,true);
        var_dump($data);
        var_dump(count($data));
        $file = fopen('posts_file.json', 'w');
        foreach ($data as $line){
            fwrite($file,json_encode($line) . PHP_EOL);
        }
        fclose($file);
    }
}


