<?php
namespace ImgSeek\Gateway;

/**
 * @author Richard Shank <develop@zestic.com>
 */
interface ImgSeekGatewayInterface
{
    /**
     * Make a request to ImgSeek
     *
     * @param $function
     * @param array $parameters
     *
     * @return array
     */
    function request($function, array $parameters = null);
}
