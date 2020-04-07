<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/** TestController
 * 
 * @Route("/test", name="test_")
 */
class TestController extends AbstractController
{
    /** testHome
     * 
     * @Route("/", name="home")
     */
    public function testHome()
    {
        return $this->render('test/home.html.twig');
    }
}
