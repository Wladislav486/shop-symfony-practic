<?php

namespace App\Form\Dto;

use App\Entity\Category;
use Symfony\Component\Validator\Constraints as Assert;

class EditCategoryModel
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
     * @param Category|null $category
     * @return EditCategoryModel
     */
    public static function makeFromCategory(?Category $category): EditCategoryModel
    {
        $model = new self();
        if (!$category) {
            return $model;
        }

        $model->id = $category->getId();
        $model->title = $category->getTitle();

        return $model;
    }
}