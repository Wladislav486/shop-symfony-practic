<?php

namespace App\Form\Dto;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class EditProductModel
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @Assert\NotBlank(message="Please enter a title")
     * @var string
     */
    public string $title;

    /**
     * @Assert\NotBlank(message="Please enter a price")
     * @Assert\GreaterThanOrEqual(value="0")
     * @var string
     */
    public string $price;

    /**
     * @Assert\File(
     *     maxSize = "5024k",
     *     mimeTypes = {"image/jpeg", "image/png"},
     *     mimeTypesMessage = "Please upload a valid image"
     * )
     * @var UploadedFile|null
     */
    public ?UploadedFile $newImage;

    /**
     * @Assert\NotBlank(message="Please indicate the quantity")
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