<?php
use Modelo\apiModell;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
class test extends TestCase{

    private $api;

    public function setUp(): void{
        $this->api = new apiModell();
    }

    public function test1(){
        $result = $this->api->extraer();

        $this->assertNotNull(($result));
        $this->assertIsArray(($result));
    }

}