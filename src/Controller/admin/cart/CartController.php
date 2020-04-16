<?php

namespace App\Controller\admin\cart;


use App\Entity\Cart;
use App\Form\CartType;
use App\Repository\CartRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
  /**
   * @Route("/admin/cartList", name="cart_list")
   * @param CartRepository $cartRepository
   * @return Response
   */
  public function cartList(CartRepository $cartRepository)
  {
    $carts = $cartRepository->findAll();
    return $this->render('admin/cart/CartList.html.twig', [
      'carts' => $carts
    ]);
  }

  /**
   * @Route("/admin/cart/new", name="cart_new")
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse|Response
   */
  public function new(Request $request, EntityManagerInterface $manager)
  {
    $cart = new Cart();
    $form = $this->createForm(CartType::class, $cart);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->persist($cart);
      $manager->flush();
      $this->addFlash('success', 'Created with success');
      return $this->redirectToRoute('cart_list');
    }
    return $this->render('admin/cart/New.html.twig', [
      'form' => $form->createView()
    ]);
  }


  /**
   * @Route("/admin/cart/{id}", name="cart_edit", methods="GET|POST")
   * @param Cart $cart
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse|Response
   */
  public function edit(Cart $cart, Request $request, EntityManagerInterface $manager)
  {
    $form = $this->createForm(CartType::class, $cart);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->flush();
      $this->addFlash('success', 'Updated with success');
      return $this->redirectToRoute('cart_list');
    }
    return $this->render('admin/cart/Edit.html.twig', [
      'form' => $form->createView()
    ]);
  }

  /**
   * @Route("/admin/cart/delete/{id}", name="cart_delete", methods="DELETE")
   * @param Cart $cart
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse
   */
  public function delete(Cart $cart, Request $request, EntityManagerInterface $manager)
  {
    if ($this->isCsrfTokenValid('delete' . $cart->getId(), $request->get('_token'))) {
      $manager->remove($cart);
      $manager->flush();
      $this->addFlash('success', 'Deleted with success');
    }
    return $this->redirectToRoute('cart_list');
  }

}
