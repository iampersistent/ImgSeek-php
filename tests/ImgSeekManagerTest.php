<?php
namespace ImgSeek;

use ImgSeek\Entity\Image;
use ImgSeek\ImgSeekManager;

require_once __DIR__ . '/fixtures/ImgSeekTestGateway.php';
/**
 * @author Richard Shank <develop@zestic.com>
 */
class ImgSeekManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testImageMustBeSet()
    {
        $mgr = $this->createImageSeekManager();
        $this->setExpectedException('ImgSeek\Exception\ImageSourceException', 'You must set a filename, url or blob for Image');
        $mgr->addImage(new Image());
    }

    public function testAddImageByFile()
    {
        $image = new Image();
        $image->setFilename('forgotten.jpg');
        $mgr = $this->createImageSeekManager();

        $this->setExpectedException('Exception', 'SaveDb');   // ImgSeek is backed up
        $mgr->addImage($image);

        $this->assertSame(831, $image->getImageId(), 'the image id was generated');
    }

    public function testAddImageByUrl()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        $this->assert('the image should be downloaded to temp folder');
        $this->assert('the image is persisted before added to ImgSeek');
        $this->assertSame(831, $image->getImageId(), 'the image id was generated');
        $this->setExpectedException('TestExeception', 'SaveDbAsCalled');   // ImgSeek is backed up
    }

    public function testRemoveImage()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        $this->assert('the image is removed from ImgSeek');
        $this->assert('the image is removed from the persistence layer');
        $this->setExpectedException('TestExeception', 'SaveDbAsCalled');   // ImgSeek is backed up
    }

    public function testQueryByImage()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        $this->assert('the image id from the Image should be passed in');
        $this->assert('an array of Image objects should be returned');
        $this->assert('an empty array should be returned');

        $this->assert('an Image without an image id should throw an exception');
    }

    public function testQueryByFile()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        $this->assert('the image should be loaded through Gaufrette');
        $this->assert('an array of Image objects should be returned');

        $this->assert('an empty array should be returned');
    }

    public function testQueryByUrl()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        $this->assert('the image should be downloaded');
        $this->assert('an array of Image objects should be returned');

        $this->assert('an empty array should be returned');
    }

    protected function createImageSeekManager()
    {

        $mgr = new ImgSeekManager(new \ImgSeekTestGateway());

        return $mgr;
    }
}

