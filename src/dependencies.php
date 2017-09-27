<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($container) {
    $settings = $container->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($container) {
    $settings = $container->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// Register component on container
$container['view'] = function ($container) {

    $templatesPath = realpath(__DIR__.'/templates');
    $loader = new \Twig_Loader_Filesystem($templatesPath);

    $templateEngine = new \Twig_Environment($loader, [
        'auto_reload' => true,
        'debug'       => true,
    ]);

    $templateEngine->addExtension(new \Twig_Extension_Debug());

    return $templateEngine;
};

                       /************ SERVICES **********/

$container['Posts\PostService'] = function($container)
{
    return new \App\Service\Posts\Post();
};

$container['Posts\IndexService'] = function($container)
{
    return new \App\Service\Posts\Index($container['view']);
};

$container['Posts\GetService'] = function($container)
{
    return new \App\Service\Posts\Get($container['view']);
};

$container['Posts\DeleteService'] = function($container)
{
    return new \App\Service\Posts\Delete();
};

$container['Posts\PutService'] = function($container)
{
    return new \App\Service\Posts\Put();
};

$container['Comments\PostService'] = function($container)
{
    return new \App\Service\Comments\Post();
};


