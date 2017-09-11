<?php

$app->post('/posts', \Posts\PostService::class . ':run');
$app->get('/posts', \Posts\IndexService::class . ':run');
$app->get('/posts/{id}', \Posts\GetService::class . ':run');
$app->delete('/posts/{id}', \Posts\DeleteService::class . ':run');
$app->put('/posts', \Posts\PutService::class . ':run');
    