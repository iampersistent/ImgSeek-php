<?php
namespace ImgSeek;

use Gaufrette\Filesystem;
use ImgSeek\Entity\ImageInterface;
use ImgSeek\Exception\ImageSourceException;
use ImgSeek\Gateway\ImgSeekGatewayInterface;
use ImgSeek\Gateway\PersistenceGatewayInterface;
/**
 * @author Richard Shank <develop@zestic.com>
 */
class ImgSeekManager
{
    protected $filePath;
    protected $filesystem;
    protected $imgSeekGateway;
    protected $persistence;

    public function __construct(ImgSeekGatewayInterface $imgSeekGateway, PersistenceGatewayInterface $persistenceGateway, Filesystem $filesystem, array $config)
    {
        $this->defaultDbId = $config['dbId'];
        $this->filePath = $config['filePath'];
        $trailing =    strrpos($this->filePath, '/')   ;
        $len = strlen($this->filePath);
        if (strrpos($this->filePath, '/') < (strlen($this->filePath) - 1)) {
            $this->filePath .= '/';
        }
        $this->filesystem = $filesystem;
        $this->imgSeekGateway = $imgSeekGateway;
        $this->persistence = $persistenceGateway;
    }

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
        $rp = new \ReflectionProperty($image, 'databaseId');
        $rp->setAccessible(true);
        $rp->setValue($image, $this->defaultDbId);
        $rp->setAccessible(false);

        if ($url = $image->getUrl()) {
            throw new \Exception('not implemented');
        } else {
            if ($filename = $image->getFilename())  {
                $blob = $this->filesystem->read($filename);
            } elseif (!$blob = $image->getBlob()) {
                throw new ImageSourceException('You must set a filename, url or blob for Image');
            }
            $this->persistence->persistImage($image, true);
            $this->imgSeekGateway->request('addImgBlob', array($image->getDatabaseId(), $image->getImageId(), $blob));
        }

        // save database
        $this->saveImgSeek();
    }

    /**
     * Remove an image from the ImgSeek engine and remove persistence.
     *
     * @param ImgSeek\Entity\ImageInterface $image
     */
    public function removeImage(ImageInterface $image)
    {

    }

    /**
     * Save the ImgSeek database
     */
    public function saveImgSeek()
    {
        return $this->imgSeekGateway->request('saveDbAs', array($this->defaultDbId, $this->generateDbFileName()));
    }

    protected function generateDbFileName()
    {
        return $this->filePath . sprintf('imgseek-db-%s.db', $this->defaultDbId);
    }
}

