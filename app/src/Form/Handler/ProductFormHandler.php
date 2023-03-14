<?php

namespace App\Form\Handler;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Form;

class ProductFormHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function processEditForm(Product $product, Form $form): Product
    {
        $this->entityManager->persist($product);

        dd($product, $form->get('newImage')->getData());
        $this->entityManager->flush();
        return $product;
    }
}