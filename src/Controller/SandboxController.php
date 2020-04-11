<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SandboxController extends AbstractController
{
    /**
     * @Route("/sandbox", name="sandbox")
     */
    public function index()
    {
        return $this->render('sandbox/sandbox.html.twig');
    }
}
