<?php

namespace App\Utils\Manager;

use App\Entity\Product;
use App\Entity\ProductImage;
use App\Utils\File\ImageResizer;
use App\Utils\FileSystem\FileSystemWorker;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class ProductImageManager extends AbstractBaseManager
{

    /**
     * @var FileSystemWorker
     */
    private FileSystemWorker $fileSystemWorker;

    /**
     * @var string
     */
    private string $uploadsTempDir;

    /**
     * @var ImageResizer
     */
    private ImageResizer $imageResizer;

    public function __construct(EntityManagerInterface $entityManager, FileSystemWorker $fileSystemWorker, ImageResizer $imageResizer, string $uploadsTempDir)
    {
        parent::__construct($entityManager);
        $this->fileSystemWorker = $fileSystemWorker;
        $this->uploadsTempDir = $uploadsTempDir;
        $this->imageResizer = $imageResizer;
    }

    /**
     * @param string $productDir
     * @param string|null $tempImagesFileName
     * @return ProductImage|null
     */
    public function saveImageForProduct(string $productDir, string $tempImagesFileName = null): ?ProductImage
    {
        if (!$tempImagesFileName) {
            return null;
        }

        $this->fileSystemWorker->createFolderIfItNotExists($productDir);

        $fileNameId = uniqid();

        $imageSmall = $this->imageResizer->resizeImageAndSave(
            $this->uploadsTempDir,
            $tempImagesFileName,
            [
                'width' => 60,
                'height' => null,
                'newFolder' => $productDir,
                'newFilename' => sprintf('%s_%s.jpg', $fileNameId, 'small')
            ]
        );

        $imageMiddle = $this->imageResizer->resizeImageAndSave(
            $this->uploadsTempDir,
            $tempImagesFileName,
            [
                'width' => 430,
                'height' => null,
                'newFolder' => $productDir,
                'newFilename' => sprintf('%s_%s.jpg', $fileNameId, 'middle')
            ]
        );

        $imageBig = $this->imageResizer->resizeImageAndSave(
            $this->uploadsTempDir,
            $tempImagesFileName,
            [
                'width' => 800,
                'height' => null,
                'newFolder' => $productDir,
                'newFilename' => sprintf('%s_%s.jpg', $fileNameId, 'big')
            ]
        );

        $productImage = new ProductImage();
        $productImage->setFilenameSmall($imageSmall);
        $productImage->setFilenameMiddle($imageMiddle);
        $productImage->setFilenameBig($imageBig);

        return $productImage;
    }


    /**
     * @param Product $product
     * @param ProductImage $productImage
     * @param string $productDir
     * @return void
     */
    public function removeImageFromProduct(Product $product, ProductImage $productImage, string $productDir)
    {
        $smallFilePath = $productDir . '/' . $productImage->getFilenameSmall();
        $middleFilePath = $productDir . '/' . $productImage->getFilenameMiddle();
        $bigFilePath = $productDir . '/' . $productImage->getFilenameBig();

        $this->fileSystemWorker->remove($smallFilePath);
        $this->fileSystemWorker->remove($middleFilePath);
        $this->fileSystemWorker->remove($bigFilePath);

        $product = $productImage->getProduct();
        $product->removeProductImage($productImage);

        $this->entityManager->flush();
    }

    /**
     * @return ObjectRepository
     */
    public function getRepository(): ObjectRepository
    {
        return $this->entityManager->getRepository(ProductImage::class);
    }
}