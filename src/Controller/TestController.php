<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
  /** testhome
   *
   * @Route("/test", name="test_home")
   */
  public function index()
  {
    return $this->render('test/home.html.twig');
  }

}
