<?php
namespace ImgSeek;

use ImgSeek\Entity\Image;
use ImgSeek\ImgSeekManager;

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

    public function testSaveImgSeek()
    {
        $mgr = $this->createImageSeekManager();
        $this->setExpectedException('ImgSeek\Exception\ImgSeekException', 'saveDbAs');
        $mgr->saveImgSeek();
    }

    public function testFilePath()
    {
        $mgr = $this->createImageSeekManager(null, null, null, null, array('filePath' => '/no-trailing'));
        $rp = new \ReflectionProperty($mgr, 'filePath');
        $rp->setAccessible(true);

        $this->assertSame('/no-trailing/', $rp->getValue($mgr));

        $mgr = $this->createImageSeekManager(null, null, null, null, array('filePath' => '/trailing/'));
        $this->assertSame('/trailing/', $rp->getValue($mgr));
    }

    public function testAddImageByFile()
    {
        $image = new Image();
        $image->setFilename('forgotten.jpg');
        $mgr = $this->createImageSeekManager();

        $this->setExpectedException('ImgSeek\Exception\ImgSeekException', 'saveDbAs');
        $mgr->addImage($image);

        $this->assertSame(44, $image->getImageId(), 'the image id was generated');
    }

    public function testAddImageByUrl()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        $this->assert('the image should be downloaded to temp folder');
        $this->assert('the image is persisted before added to ImgSeek');
        $this->assertSame(44, $image->getImageId(), 'the image id was generated');
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
        $mgr = $this->createImageSeekManager();
        $images = $mgr->queryByUrl('http://testing.com/forgotten.jpg');


        $this->assert('the image should be downloaded');
        $this->assert('an array of 1 Image objects should be returned');
        $this->assert('an array of Image objects should be returned');

        $this->assert('an empty array should be returned');
    }

    protected function createImageSeekManager($imgSeekGateway = null, $persistenceGateway = null, $filesystem = null, $client = null, array $config = array())
    {
        if (!$imgSeekGateway) {
            $imgSeekGateway = new \ImgSeekTestGateway();
        }
        if (!$filesystem) {
            $adapter = new \Gaufrette\Adapter\Local(__DIR__.'/../tests/fixtures/images');
            $filesystem = new \Gaufrette\Filesystem($adapter);
        }
        $config = array_merge(array(
            'dbId' => 1,
            'filePath' => __DIR__.'/../tests/temp/imgseek',
        ), $config);
        if (!$persistenceGateway) {
            $persistenceGateway = new \PersistenceTestGateway();
        }
        if (!$client) {
            $client = $this->getMock('Buzz\Client\Curl', array('lastResponse'));
            $client->expects($this->any())
                ->method('lastResponse')
                ->will($this->returnValue('fakeimage'));
        }

        return new ImgSeekManager($imgSeekGateway, $persistenceGateway, $filesystem, $client, $config);
    }
}

