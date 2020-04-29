<?php

namespace App\Controller\admin;

use App\Repository\CartRepository;
use App\Repository\ImageRepository;
use App\Repository\ProductRepository;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Json Controller, retourne les différents tableaux d'admin
 */
class SinglePageController extends AbstractController
{

  /**
   * @Route("/admin/productPanel", name="product_panel")
   * @param ProductRepository $productRepository
   * @return Response
   */
  public function productPanel(ProductRepository $productRepository)
  {
    $products = $productRepository->findAll();
    $view = $this->renderView('admin/product/ProductList.html.twig', [
      'products' => $products
    ]);
    return $this->json(['view' => $view]);
  }

  /**
   * @Route("/admin/tagPanel", name="tag_panel")
   * @param TagRepository $tagRepository
   * @return Response
   */
  public function tagPanel(TagRepository $tagRepository)
  {
    $tags = $tagRepository->findAll();
    $view = $this->renderView('admin/tag/TagList.html.twig', [
      'tags' => $tags
    ]);
    return $this->json(['view' => $view]);
  }

  /**
   * @Route("/admin/imagePanel", name="image_panel")
   * @param ImageRepository $imageRepository
   * @return Response
   */
  public function imagePanel(ImageRepository $imageRepository)
  {
    $images = $imageRepository->findAll();
    $view = $this->renderView('admin/image/ImageList.html.twig', [
      'images' => $images
    ]);
    return $this->json(['view' => $view]);
  }

  /**
   * @Route("/admin/cartPanel", name="cart_panel")
   * @param CartRepository $cartRepository
   * @return Response
   */
  public function cartPanel(CartRepository $cartRepository)
  {
    $carts = $cartRepository->findAll();
    $view = $this->renderView('admin/cart/CartList.html.twig', [
      'carts' => $carts
    ]);
    return $this->json(['view' => $view]);
  }



}
