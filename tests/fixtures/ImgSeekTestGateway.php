<?php

use ImgSeek\Exception\ImgSeekException;
use ImgSeek\Gateway\ImgSeekGatewayInterface;
/**
 * @author Richard Shank <develop@zestic.com>
 */
class ImgSeekTestGateway implements ImgSeekGatewayInterface
{
    public function request($function, array $parameters = null)
    {
        if ($function == 'addImgBlob') {
            if (!$parameters[0]) {
                throw new Exception('the first parameter in addImgBlob should have a dbId');
            }
            if (!$parameters[1]) {
                throw new Exception('the second parameter in addImgBlob should have a imageId');
            }
            if (!$parameters[2] || is_string($parameters[2])) {
                throw new Exception('the third parameter in addImgBlob should have a string of image data');
            }

        }
        throw new ImgSeekException($function);
    }
}
