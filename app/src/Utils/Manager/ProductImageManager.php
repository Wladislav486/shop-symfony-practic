<?php

namespace App\Utils\Manager;

use App\Entity\ProductImage;
use App\Utils\FileSystem\FileSystemWorker;
use Doctrine\ORM\EntityManagerInterface;

class ProductImageManager
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @var FileSystemWorker
     */
    private FileSystemWorker $fileSystemWorker;

    /**
     * @var string
     */
    private string $uploadsTempDir;

    public function __construct(EntityManagerInterface $entityManager, FileSystemWorker $fileSystemWorker, string $uploadsTempDir)
    {

        $this->entityManager = $entityManager;
        $this->fileSystemWorker = $fileSystemWorker;
        $this->uploadsTempDir = $uploadsTempDir;
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
        $imageSmallParams = [
            'width' => 60,
            'height' => null,
            'newFolder' => $productDir,
            'newFilename' => sprintf('%s_%s.jpg', $fileNameId, 'small')
        ];
        $imageSmall = '';
        $imageMiddleParams = [
            'width' => 430,
            'height' => null,
            'newFolder' => $productDir,
            'newFilename' => sprintf('%s_%s.jpg', $fileNameId, 'middle')
        ];
        $imageMiddle = '';
        $imageBigParams = [
            'width' => 800,
            'height' => null,
            'newFolder' => $productDir,
            'newFilename' => sprintf('%s_%s.jpg', $fileNameId, 'big')
        ];
        $imageBig = '';

        $productImage = new ProductImage();
        $productImage->setFilenameSmall($imageSmall);
        $productImage->setFilenameMiddle($imageMiddle);
        $productImage->setFilenameBig($imageBig);

        return $productImage;
    }
}