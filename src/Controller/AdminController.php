<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
  /** admin
   *
   * @Route("/admin", name="admin")
   * @param ProductRepository $repository
   * @return Response
   */
  public function index(ProductRepository $repository)
  {
    $products = $repository->findAll();
    return $this->render('admin/admin.html.twig', [
      'products' => $products
    ]);
  }

  /**
   * @Route("admin/create", name="product_new")
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse|Response
   */
  public function new(Request $request, EntityManagerInterface $manager)
  {
    $products = new Product();
    $form = $this->createForm(ProductType::class, $products);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->persist($products);
      $manager->flush();
      $this->addFlash('success', 'Created with success');
      return $this->redirectToRoute('admin');
    }
    return $this->render('admin/projects/New.html.twig', [
      'products' => $products,
      'form' => $form->createView()
    ]);
  }

  /**
   * @Route("/admin/delete/{id}", name="admin_delete", methods="DELETE")
   * @param Product $product
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse
   */
  public function delete(Product $product, Request $request, EntityManagerInterface $manager)
  {
    if ($this->isCsrfTokenValid('delete' . $product->getId(), $request->get('_token'))) {
      $manager->remove($product);
      $manager->flush();
      $this->addFlash('success', 'Deleted with success');
    }
    return $this->redirectToRoute('admin');
  }
}
