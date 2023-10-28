<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../bootstrap/app.php';

$app = app();
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);