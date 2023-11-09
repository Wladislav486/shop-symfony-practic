<?php

namespace App\Controller;

use App\Entity\Category;
use Bitrix\Calendar\Sync\Exceptions\NotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{slug}", name="main_category_show")
     * @throws NotFoundException
     */
    public function show(Category $category): Response
    {
        if (!$category) {
            throw new NotFoundException();
        }

        dd($category);

        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
