<?php

$app->post('/', \Posts\PostService::class . ':run');
$app->get('/', \Posts\IndexService::class . ':run');
$app->get('/{id}', \Posts\GetService::class . ':run');
$app->delete('/{id}', \Posts\DeleteService::class . ':run');
$app->put('/', \Posts\PutService::class . ':run');


    