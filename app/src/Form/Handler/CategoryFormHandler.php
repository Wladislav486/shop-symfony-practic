<?php

namespace App\Form\Handler;

use App\Entity\Category;
use App\Form\Dto\EditCategoryModel;
use App\Utils\Manager\CategoryManager;

class CategoryFormHandler
{
    /**
     * @var CategoryManager
     */
    private CategoryManager $categoryManager;

    public function __construct(CategoryManager $categoryManager)
    {

        $this->categoryManager = $categoryManager;
    }

    /**
     * @param EditCategoryModel $editCategoryModel
     * @return Category|null
     */
    public function processEditForm(EditCategoryModel $editCategoryModel): ?Category
    {
        $category = new Category();

        if (isset($editCategoryModel->id) && $editCategoryModel->id) {
            $category = $this->categoryManager->find($editCategoryModel->id);
        }

        $category->setTitle($editCategoryModel->title);

        $this->categoryManager->save($category);

        return $category;
    }
}