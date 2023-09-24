<?php

namespace App\Form\Handler;

use App\Entity\Product;
use App\Utils\File\FileSaver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Form;

class ProductFormHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var FileSaver
     */
    private $fileSaver;

    public function __construct(EntityManagerInterface $entityManager, FileSaver $fileSaver)
    {
        $this->entityManager = $entityManager;
        $this->fileSaver = $fileSaver;
    }


    public function processEditForm(Product $product, Form $form): Product
    {
        $this->entityManager->persist($product);

        $newImageFile = $form->get('newImage')->getData();
        $tempImageFileName = $newImageFile
            ? $this->fileSaver->saveUploadedFileIntoTemp($newImageFile)
            : null;

        dd($tempImageFileName);

        $this->entityManager->flush();
        return $product;
    }
}