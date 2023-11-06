<?php

namespace App\Form\Dto;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class EditProductModel
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $price;

    /**
     * @var UploadedFile|null
     */
    public ?UploadedFile $newImage;

    /**
     * @var int
     */
    public int $quantity;

    /**
     * @var string
     */
    public string $description;

    /**
     * @var bool
     */
    public bool $isPublished;

    /**
     * @var bool
     */
    public bool $isDeleted;

    /**
     * @param Product|null $product
     * @return EditProductModel
     */
    public static function makeFromProduct(?Product $product): EditProductModel
    {
        $model = new self();
        if (!$product) {
            return $model;
        }

        $model->id = $product->getId();
        $model->title = $product->getTitle();
        $model->price = $product->getPrice();
        $model->quantity = $product->getQuantity();
        $model->description = $product->getDescription();
        $model->isPublished = $product->getIsPublished();
        $model->isDeleted = $product->getIsDeleted();

        return $model;
    }
}