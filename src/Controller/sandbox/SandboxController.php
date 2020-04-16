<?php

namespace App\Controller\sandbox;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SandboxController extends AbstractController
{
  /**
   * @Route("/sandbox", name="sandbox")
   * @param ProductRepository $repository
   * @return Response
   */
    public function index(ProductRepository $repository)
    {
      $products = $repository->findAll();
      return $this->render('sandbox/Sandbox.html.twig', [
        'products' => $products
      ]);
    }
}
