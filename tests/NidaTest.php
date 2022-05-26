<?php
// use Alpha

use Alphaolomi\Nida\Nida;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;


it('can instantiate nida class', function () {
    $nida = new Nida();
    expect($nida)->not->toBeNull();
    expect($nida)->toBeTruthy();
    expect($nida)->toBeInstanceOf(Nida::class);
});

it('can change Guzzle client', function () {
    $nida = new Nida();
    $client = new \GuzzleHttp\Client();
    $nida->setClient($client);
    expect($nida->getClient())->toBe($client);
});

it('throws exception if not valid NIN | test empty string', function () {
    $nida = new Nida();
    $nationalId = '';
    $nida->getUserData($nationalId);
})->throws(\InvalidArgumentException::class);


it('throws exception if not valid NIN | test string nin', function () {
    $nida = new Nida();
    $nationalId = str_repeat("a", 20); // must be numeric
    $nida->getUserData($nationalId);
})->throws(\InvalidArgumentException::class);




it('can get user data', function () {
    $responseStubBody = '{"obj":{"result":{"NIN":"19990101151120000226","FIRSTNAME":"JOHN","MIDDLENAME":"DOE","SURNAME":"MASSAWE","SEX":"MALE","DATEOFBIRTH":"1999-01-01","NATIONALITY":"TANZANIAN"},"_startTotalMemory":40090704,"_end":"2022-05-13T11:33:44.4536599","_start":"2022-05-13T11:33:43.3755342","_endTotalMemory":40726584,"_usedTotalMemory":635880,"error":"","_elapsed":1.072}}';
    $mock = new MockHandler([
        new Response(200, [], $responseStubBody),
    ]);

    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);

    $nida = new Nida();
    $nida->setClient($client);
    $res =  $nida->getUserData('19990101151120000226');
    expect($res)->toBeTruthy();
    $mock->reset();
});
