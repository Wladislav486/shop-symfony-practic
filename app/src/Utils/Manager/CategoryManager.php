<?php


namespace App\Utils\Manager;


use App\Entity\Category;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class CategoryManager extends AbstractBaseManager
{
    /**
     * @return ObjectRepository
     */
    public function getRepository(): ObjectRepository
    {
        return $this->entityManager->getRepository(Category::class);
    }

    /**
     * @param Category $category
     * @return void
     */
    public function remove(object $category)
    {
        $category->setIsDeleted(true);

        /** @var Product $product */
        foreach ($category->getProducts()->getValues() as $product) {
            $product->setIsDeleted(true);
        }
        $this->save($category);
    }
}