<?php

use ImgSeek\Gateway\ImgSeekGatewayInterface;
/**
 * @author Richard Shank <develop@zestic.com>
 */
class ImgSeekTestGateway implements ImgSeekGatewayInterface
{
    function request($function, array $parameters = null)
    {
        throw new Exception($function);
    }
}
