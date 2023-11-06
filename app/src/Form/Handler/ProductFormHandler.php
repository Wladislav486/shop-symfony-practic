<?php

namespace App\Form\Handler;

use App\Entity\Product;
use App\Form\Dto\EditProductModel;
use App\Utils\File\FileSaver;
use App\Utils\Manager\ProductManager;
use Symfony\Component\Form\Form;

class ProductFormHandler
{

    /**
     * @var FileSaver
     */
    private FileSaver $fileSaver;

    /**
     * @var ProductManager
     */
    private ProductManager $productManager;

    public function __construct(ProductManager $productManager, FileSaver $fileSaver)
    {
        $this->fileSaver = $fileSaver;
        $this->productManager = $productManager;
    }


    /**
     * @param EditProductModel $editProductModel
     * @param Form $form
     * @return Product
     */
    public function processEditForm(EditProductModel $editProductModel, Form $form): Product
    {
        $product = new Product();

        if (isset($editProductModel->id) && $editProductModel->id) {
            $product = $this->productManager->find($editProductModel->id);
        }

        $product->setTitle($editProductModel->title);
        $product->setPrice($editProductModel->price);
        $product->setQuantity($editProductModel->quantity);
        $product->setDescription($editProductModel->description);
        $product->setIsPublished($editProductModel->isPublished);
        $product->setIsDeleted($editProductModel->isDeleted);

        $this->productManager->save($product);

        $newImageFile = $form->get('newImage')->getData();

        $tempImageFileName = $newImageFile
            ? $this->fileSaver->saveUploadedFileIntoTemp($newImageFile)
            : null;


        $this->productManager->updateProductImages($product, $tempImageFileName);
        $this->productManager->save($product);

        return $product;
    }
}