<?php

use Gateway\QueryInterface;
use ImgSeek\Entity\Image;
use ImgSeek\Entity\ImageInterface;
use ImgSeek\Exception\ImgSeekException;
use ImgSeek\Gateway\PersistenceGatewayInterface;
/**
 * @author Richard Shank <develop@zestic.com>
 */
class PersistenceTestGateway implements PersistenceGatewayInterface
{
    protected $imageId;

    public  function __construct($imageId = 44)
    {
        $this->imageId = $imageId;
    }

    public function deleteImage(ImageInterface $image)
    {
        throw new \Exception('not implemented');
    }

    public function findImage(QueryInterface $query = null)
    {
        throw new \Exception('not implemented');
    }

    public function findImages(array $imageIds)
    {
        $images = array();
        $rp = new \ReflectionProperty('ImgSeek\Entity\Image', 'imageId');
        $rp->setAccessible(true);

        foreach ($imageIds as $imageId) {
            $image = new Image();
            $rp->setValue($image, $imageId);

            $images[] = $image;
        }

        return $images;
    }

    public function persistImage(ImageInterface $image)
    {
        $rp = new ReflectionProperty($image, 'imageId');
        $rp->setAccessible(true);
        $rp->setValue($image, $this->imageId);
        $this->imageId++;
    }

    public function updateImage(ImageInterface $image)
    {
        throw new \Exception('not implemented');
    }
}
