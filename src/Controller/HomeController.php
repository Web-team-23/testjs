<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/** HomeController
 *
 */
class HomeController extends AbstractController
{
  /** home
   *
   * @Route("/", name="home")
   */
  public function home()
  {
    return $this->render('home.html.twig');
  }


}
