<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use App\Entity\StaticStorage\OrderStaticStorage;
use App\Repository\OrderRepository;
use App\Utils\Manager\OrderManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/order", name="admin_order_")
 */
class OrderController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function list(OrderRepository $orderRepository): Response
    {
        $orders = $orderRepository->findBy(['isDeleted' => false], ['id' => 'DESC'], 50);

        return $this->render('admin/order/list.html.twig', [
            'orders' => $orders,
            'orderStatusChoices' => OrderStaticStorage::getOrderStatusChoices()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     * @Route("/add", name="add")
     */
    public function edit(Request $request, Order $order = null): Response
    {
/*        $editCategoryModel = EditCategoryModel::makeFromCategory($category);

        $form = $this->createForm(EditCategoryFormType::class, $editCategoryModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $categoryFormHandler->processEditForm($editCategoryModel);

            $this->addFlash('success', 'Your changes were saved!');

            return $this->redirectToRoute('admin_category_edit', ['id' => $category->getId()]);
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('warning', 'Something went wrong. Please check your form!');
        }*/

        return $this->render('admin/category/edit.html.twig', [
            'category' => $category,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Order $order, OrderManager $orderManager): Response
    {
        $orderManager->remove($order);

        $this->addFlash('warning', 'The order was successfully deleted!');
        return $this->redirectToRoute('admin_order_list');
    }
}
