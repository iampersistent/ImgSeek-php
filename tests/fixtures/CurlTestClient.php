<?php

use Buzz\Client\Curl;
use Buzz\Message\RequestInterface;
use Buzz\Message\MessageInterface;
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

    public function send(RequestInterface $request, MessageInterface $response)
    {
        $response->setContent($this->content);
    }
}
