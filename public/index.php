<?php

require __DIR__.'/../vendor/autoload.php';

use App\Format\{JSON,XML,YAML};
use App\Format\FormatInterface;
use App\Container;

$container = new Container();

$container->addService('format.json', function() use ($container) {
    return new JSON();
});

$container->addService('format.xml', function() use ($container) {
    return new XML();
});

$container->addService('format', function() use ($container) {
    return $container->getService('format.json');
}, FormatInterface::class);

// $container->addService('serializer', function() use ($container) {
//     return new Serializer($container->getService('format'));
// });

// $container->addService('controller.index', function() use ($container) {
//     return new IndexController($container->getService('serializer'));
// });

$container->loadServices('App\\Service');
$container->loadServices('App\\Controller');

var_dump($container->getServices());
var_dump($container->getService('App\\Controller\\IndexController')
    ->index());


// $json = new JSON($data);
// $xml = new XML($data);
// $yml = new YAML($data);

// function convertData(BaseFormat $format)
// {
//   return $format->convert();
// }

// $formats = [$json, $xml, $yml];

// function findByName(string $name, array $formats): ?BaseFormat
// {
//   $found = array_filter($formats, function ($format) use ($name) {
//     return $format->getName() === $name;
//   });

//   if (count($found)) {
//     return reset($found);
//   }

//   return null;
// }

// var_dump(findByName('ELSE', $formats));