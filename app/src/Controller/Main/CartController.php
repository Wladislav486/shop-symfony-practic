<?php

namespace App\Controller\Main;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/api", name="main_api_")
 */
class CartController extends AbstractController
{
    /**
     * @Route("/cart", methods = "POST", name="cart_save")
     */
    public function saveCart(Request $request): Response
    {

        $productId = $request->request->get('productId');
        $phpSessionId = $request->cookies->get('PHPSESSID');

        dd($productId, $phpSessionId);
        return new JsonResponse([
            'success' => false,
            'data' => [
                'test' => 123
            ]
        ]);
    }
}
