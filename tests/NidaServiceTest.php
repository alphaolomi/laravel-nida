<?php

use Alphaolomi\Nida\Facades\Nida;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

it('can get data using facade', function () {
    $responseStubBody = '{"obj":{"result":{"NIN":"19990101151120000226","FIRSTNAME":"JOHN","MIDDLENAME":"DOE","SURNAME":"MASSAWE","SEX":"MALE","DATEOFBIRTH":"1999-01-01","NATIONALITY":"TANZANIAN"},"_startTotalMemory":40090704,"_end":"2022-05-13T11:33:44.4536599","_start":"2022-05-13T11:33:43.3755342","_endTotalMemory":40726584,"_usedTotalMemory":635880,"error":"","_elapsed":1.072}}';
    $mock = new MockHandler([
        new Response(200, [], $responseStubBody),
    ]);
    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);
    $res = Nida::setClient($client)->getUserData('19990101151120000226');
    expect($res)->toBeTruthy();
    $mock->reset();
});
