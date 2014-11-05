<?php

require __DIR__."/../index.php";

class HttpStatusCodeTest extends PHPUnit_Framework_TestCase {

    public function testContinue() {
        $this->assertEquals(100, Http\_Continue);
    }

    public function testSwitchingProtocols() {
        $this->assertEquals(101, Http\_Switching_Protocols);
    }

    public function testSwitchingProtocols2() {
        $this->assertEquals(101, Http\Switching_Protocols);
    }

    public function testOk() {
        $this->assertEquals(200, Http\_Ok);
    }

}

/*
var_dump(Http\_Continue);
var_dump(Http\_Switching_Protocols);
var_dump(Http\Switching_Protocols);
var_dump(Http\Ok);
*/
