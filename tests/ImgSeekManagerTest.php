<?php
namespace ImgSeek;

use ImgSeek\ImgSeekManager;
/**
 * @author Richard Shank <develop@zestic.com>
 */
class ImgSeekManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testAddImageByFile()
    {
        $this->assert('the image should be loaded through Gaufrette');
        $this->assert('the image is persisted before added to ImgSeek');
        $this->assert('ImgSeek is backed up and persisted');
    }

    public function testAddImageByUrl()
    {
        $this->assert('the image should be downloaded');
        $this->assert('the image should be saved through Gaufrette');
        $this->assert('the image is persisted before added to ImgSeek');
        $this->assert('ImgSeek is backed up and persisted');
    }
    public function testRemoveImage()
    {
        $this->assert('the image is removed from ImgSeek');
        $this->assert('the image is removed from the persistence layer');
        $this->assert('ImgSeek is backed up and persisted');
    }

    public function testQueryByImage()
    {
        $this->assert('the image id from the Image should be passed in');
        $this->assert('an array of Image objects should be returned');
        $this->assert('an empty array should be returned');

        $this->assert('an Image without an image id should throw an exception');
    }

    public function testQueryByFile()
    {
        $this->assert('the image should be loaded through Gaufrette');
        $this->assert('an array of Image objects should be returned');

        $this->assert('an empty array should be returned');
    }

    public function testQueryByUrl()
    {
        $this->assert('the image should be downloaded');
        $this->assert('an array of Image objects should be returned');

        $this->assert('an empty array should be returned');
    }
}

