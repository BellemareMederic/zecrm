<?php
/**
 * Created by PhpStorm.
 * User: Mederic
 * Date: 2017-10-08
 * Time: 02:05 PM
 */


$data = file_get_contents('https://jsonplaceholder.typicode.com/posts?userId=' . $_GET['id']);

echo $data;