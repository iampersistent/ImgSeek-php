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
                throw new \Exception('the first parameter in addImgBlob should have a dbId');
            }
            if (!$parameters[1]) {
                throw new \Exception('the second parameter in addImgBlob should have a imageId');
            }
            if (!$parameters[2] || !is_string($parameters[2])) {
                throw new \Exception('the third parameter in addImgBlob should have a string of image data');
            }

            return 1;
        }

        if ($function == 'saveDb') {
           throw new \Exception("don't use saveDb, use saveDbAs instead, to make sure the filename has been set");
        }

        if ($function == 'saveDbAs') {
            if (!$parameters[0]) {
                throw new \Exception('the first parameter in saveDbAs should have a dbId');
            }
            if (!$parameters[1] == preg_replace('/[^0-9a-z\.\_\-]/i','', $parameters[1])) {
                throw new \Exception('the second parameter in saveDbAs should have a valid filename');
            }

            throw new ImgSeekException('saveDbAs');
        }

        throw new ImgSeekException($function);
    }
}
