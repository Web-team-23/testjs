<?php

namespace App\Controller\admin\product;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

  /**
   * @Route("/admin/productList", name="product_list")
   * @param ProductRepository $productRepository
   * @return Response
   */
  public function productList(ProductRepository $productRepository)
  {

    $products = $productRepository->findAll();
    return $this->render('admin/product/ProductList.html.twig', [
      'products' => $products
    ]);
  }


  /**
   * @Route("/admin/product/new", name="product_new")
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse|Response
   */
  public function new(Request $request, EntityManagerInterface $manager)
  {
    $product = new Product();
    $form = $this->createForm(ProductType::class, $product);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->persist($product);
      $manager->flush();
      $this->addFlash('success', 'Created with success');
      return $this->redirectToRoute('product_list');
    }
    return $this->render('admin/product/New.html.twig', [

      'form' => $form->createView()
    ]);
  }

  /**
   * @Route("/admin/product/{id}", name="product_edit", methods="GET|POST")
   * @param Product $product
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse|Response
   */
  public function edit(Product $product, Request $request, EntityManagerInterface $manager)
  {
    $form = $this->createForm(ProductType::class, $product);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->flush();
      $this->addFlash('success', 'Updated with success');
      return $this->redirectToRoute('product_list');
    }
    return $this->render('admin/product/Edit.html.twig', [

      'form' => $form->createView()
    ]);
  }

  /**
   * @Route("/admin/product/delete/{id}", name="product_delete", methods="DELETE")
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
    return $this->redirectToRoute('product_list');
  }
}
