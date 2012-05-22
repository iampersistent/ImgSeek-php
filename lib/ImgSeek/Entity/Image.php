<?php
namespace ImgSeek\Entity;

use ImgSeek\Entity\ImageInterface;
/**
 * @author Richard Shank <develop@zestic.com>
 */
class Image implements ImageInterface
{
    protected $blob;
    protected $databaseId;
    protected $filename;
    protected $id;
    protected $imageId;
    protected $url;

    public function getId()
    {
        return $this->id;
    }

    public function setBlob($blob)
    {
        $this->blob = $blob;
    }

    public function getBlob()
    {
        return $this->blob;
    }

    public function getDatabaseId()
    {
        return $this->databaseId;
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function getImageId()
    {
        return $this->imageId;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }
}
