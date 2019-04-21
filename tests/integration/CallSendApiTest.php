<?php

namespace CodeBot;

use PHPUnit\Framework\TestCase;
use CodeBot\Message\Text;

class TextTest extends TestCase
{
    /**
     * @expectedException  \GuzzleHttp\Exception\GuzzleException
     */
    public function testRetornaArray()
    {
        $message = $actual = (new Text(1))->message('oi');
        (new CallSendApi('123456'))->make($message);
    }
}