<?php


namespace App\Utils\Manager;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class ProductManager
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @var string
     */
    private string $productImagesDir;

    /**
     * @var ProductImageManager
     */
    private ProductImageManager $productImageManager;

    public function __construct(EntityManagerInterface $entityManager, ProductImageManager $productImageManager, string $productImagesDir)
    {

        $this->entityManager = $entityManager;
        $this->productImagesDir = $productImagesDir;
        $this->productImageManager = $productImageManager;
    }

    /**
     * @return ObjectRepository
     */
    public function getRepository(): ObjectRepository
    {
        return $this->entityManager->getRepository(Product::class);
    }


    /**
     * @param Product $product
     * @return void
     */
    public function remove(Product $product)
    {
        $product->setIsDeleted(true);
        $this->save($product);
    }

    /**
     * @param Product $product
     * @return string
     */
    public function getProductImagesDir(Product $product): string
    {
        return sprintf('%s/%s', $this->productImagesDir, $product->getId());
    }

    /**
     * @param Product $product
     * @param string|null $tempImagesFileName
     * @return Product
     */
    public function updateProductImages(Product $product, string $tempImagesFileName = null): Product
    {
        if (!$tempImagesFileName) {
            return $product;
        }

        $productDir = $this->getProductImagesDir($product);

        $productImage = $this->productImageManager->saveImageForProduct($productDir, $tempImagesFileName);

        $product->addProductImage($productImage);

        return $product;
    }

    /**
     * @param Product $product
     * @return void
     */
    public function save(Product $product)
    {
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }
}