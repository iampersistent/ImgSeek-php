<?php
namespace ImgSeek\Gateway;

use Gateway\QueryInterface;
use ImgSeek\Entity\ImageInterface;
/**
 * @author Richard Shank <develop@zestic.com>
 */
interface PersistenceGatewayInterface
{
    /**
     * Delete a Image that has been persisted. The Image will be immediately flushed in the database
     *
     * @param ImgSeek\Entity\ImageInterface $image
     */
    function deleteImage(ImageInterface $image);

    /**
     * Find a Image by the value in a field or combination of fields
     *
     * @param Gateway\QueryInterface $query
     *
     * @return instance of ImgSeek\Entity\ImageInterface
     */
    function findImage(QueryInterface $query = null);

    /**
     * Find an array of Images by the imageId
     *
     * @param array $imageIds
     *
     * @return array of instances of ImgSeek\Entity\ImageInterface
     */
    function findImages(array $imageIds);

    /**
     * Persist a Image that has been created.  The Image will be immediately flushed in the database
     *
     * @param ImgSeek\Entity\ImageInterface $image
     */
    function persistImage(ImageInterface $image);

    /**
     * Update a Image that has been persisted.  The Image will be immediately flushed in the database
     *
     * @param ImgSeek\Entity\ImageInterface $image
     */
    function updateImage(ImageInterface $image);
}
