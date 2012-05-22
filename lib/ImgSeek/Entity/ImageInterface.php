<?php
namespace ImgSeek\Entity;

/**
 * @author Richard Shank <develop@zestic.com>
 */
interface ImageInterface
{
    /**
     * Set the image by its data
     *
     * @param $blob
     */
    function setBlob($blob);

    /**
     * Return the image by its data
     *
     * @return mixed
     */
    function getBlob();

    /**
     * Return the ImgSeek database id for this image
     *
     * @return integer
     */
    function getDatabaseId();

    /**
     * Set the image by a file location
     *
     * @param $filename
     */
    function setFilename($filename);

    /**
     * Return the image by the file location
     *
     * @return mixed
     */
    function getFilename();

    /**
     * Return the ImgSeek image id
     * @return integer
     */
    function getImageId();

    /**
     * Set the url for the image locaion
     *
     * @param $url
     */
    function setUrl($url);

    /**
     * Return the url for the image location
     *
     * @return mixed
     */
    function getUrl();
}
