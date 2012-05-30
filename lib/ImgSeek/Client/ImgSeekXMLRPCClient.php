<?php
namespace ImgSeek\Client;

use ImgSeek\Gateway\ImgSeekGatewayInterface;
/**
 * @author Richard Shank <develop@zestic.com>
 */
class ImgSeekXMLRPCClient implements ImgSeekGatewayInterface
{
    protected $imgSeekUrl;

    public function __construct($imgSeekUrl)
    {
        $this->imgSeekUrl = $imgSeekUrl;
    }

    public function request($function, array $parameters = null)
    {
        $request = \xmlrpc_encode_request($function, $parameters);
        $context = \stream_context_create(array('http' => array(
            'method' => "POST",
            'header' => "Content-Type: text/xml",
            'content' => $request
        )));
        $file = \file_get_contents($this->imgSeekUrl . '/RPC', false, $context);
        $response = \xmlrpc_decode($file);

        return $response;
    }
}
