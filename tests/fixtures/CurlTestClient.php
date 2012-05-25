<?php

use Buzz\Client\Curl;
use Buzz\Message\Request;
use Buzz\Message\Response;
use ImgSeek\Exception\ImgSeekException;
use ImgSeek\Gateway\ImgSeekGatewayInterface;
/**
 * @author Richard Shank <develop@zestic.com>
 */
class CurlTestClient extends Curl
{
    protected $content;

    public function __construct($content='response')
    {
        $this->content = $content;
    }

    public function send(Request $request, Response $response)
    {
        $response->setContent($this->content);
    }
}
