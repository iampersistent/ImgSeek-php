<?php
namespace ImgSeek;

use ImgSeek\Entity\ImageInterface;
/**
 * @author Richard Shank <develop@zestic.com>
 */
class ImgSeekManager
{
    /**
     * Return an array of Image most similar to the supplied Image
     *
     * @param Entity\ImageInterface $image
     * @param int $returns (optional) defaults to 12
     * @param int $sketch (optional)  0 for photograph 1 for sketch, defaults to 0
     * @param $fast (optional)
     *
     * @return array of ImgSeek\Entity\ImageInterface
     */
    public function queryByImage(ImageInterface $image, $returns=12, $sketch=0, $fast=false)
    {

    }

    /**
     * Return an array of Image most similar to the supplied Image
     *
     * @param $blob
     * @param int $returns (optional) defaults to 12
     * @param int $sketch (optional)  0 for photograph 1 for sketch, defaults to 0
     * @param $fast (optional)
     *
     * @return array of ImgSeek\Entity\ImageInterface
     */
    public function queryByBlob($blob, $returns=12, $sketch=0, $fast=false)
    {
        throw new \Exception('queryByBlob() has not been implemented');
    }

    /**
     * Return an array of Image most similar to the supplied image
     *
     * @param $filename
     * @param int $returns (optional) defaults to 12
     * @param int $sketch (optional)  0 for photograph 1 for sketch, defaults to 0
     * @param $fast (optional)
     *
     * @return array of ImgSeek\Entity\ImageInterface
     */
    public function queryByFile($filename, $returns=12, $sketch=0, $fast=false)
    {

    }

    /**
     * Return an array of Image most similar to the supplied image
     *
     * @param string $url
     * @param int $returns (optional) defaults to 12
     * @param int $sketch (optional)  0 for photograph 1 for sketch, defaults to 0
     * @param $fast (optional)
     *
     * @return array of ImgSeek\Entity\ImageInterface
     */
    public function queryByUrl($url, $returns=12, $sketch=0, $fast=false)
    {

    }

    /**
     * Add an image to the ImgSeek engine and persist data
     *
     * @param ImgSeek\Entity\ImageInterface $image
     */
    public function addImage(ImageInterface $image)
    {

    }

    /**
     * Remove an image from the ImgSeek engine and remove persistence.
     *
     * @param ImgSeek\Entity\ImageInterface $image
     */
    public function removeImage(ImageInterface $image)
    {

    }
}
