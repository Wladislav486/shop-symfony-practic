<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="homepage")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $productList = $entityManager->getRepository(Product::class)->findAll();
        dd($productList);
        return $this->render('main/default/index.html.twig', []);
    }

    /**
     * @Route("/product-add", name="product_add")
     */
    public function productAdd(Request $request): Response
    {
        $product = new Product();
        $product->setTitle('Product' . rand(1, 100));
        $product->setDescription('smth');
        $product->setPrice(10);
        $product->setQuantity(11);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($product);
        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }

}