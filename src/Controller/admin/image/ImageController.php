<?php

namespace App\Controller\admin\image;

use App\Entity\Image;
use App\Form\ImageType;
use App\Repository\ImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{
  /**
   * @Route("/admin/imageList", name="image_list")
   * @param ImageRepository $imageRepository
   * @return Response
   */
  public function productList(ImageRepository $imageRepository)
  {
    $images = $imageRepository->findAll();
    return $this->render('admin/image/ImageList.html.twig', [
      'images' => $images
    ]);
  }

  /**
   * @Route("/admin/image/new", name="image_new")
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse|Response
   */
  public function new(Request $request, EntityManagerInterface $manager)
  {
    $image = new Image();
    $form = $this->createForm(ImageType::class, $image);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->persist($image);
      $manager->flush();
      $this->addFlash('success', 'Created with success');
      return $this->redirectToRoute('image_list');
    }
    return $this->render('admin/image/New.html.twig', [
      'form' => $form->createView()
    ]);
  }

  /**
   * @Route("/admin/image/{id}", name="image_edit", methods="GET|POST")
   * @param Image $image
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse|Response
   */
  public function edit(Image $image, Request $request, EntityManagerInterface $manager)
  {
    $form = $this->createForm(ImageType::class, $image);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->flush();
      $this->addFlash('success', 'Updated with success');
      return $this->redirectToRoute('image_list');
    }
    return $this->render('admin/image/Edit.html.twig', [
      'form' => $form->createView()
    ]);
  }

  /**
   * @Route("/admin/image/delete/{id}", name="image_delete", methods="DELETE")
   * @param Image $image
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse
   */
  public function delete(Image $image, Request $request, EntityManagerInterface $manager)
  {
    if ($this->isCsrfTokenValid('delete' . $image->getId(), $request->get('_token'))) {
      $manager->remove($image);
      $manager->flush();
      $this->addFlash('success', 'Deleted with success');
    }
    return $this->redirectToRoute('image_list');
  }

}
