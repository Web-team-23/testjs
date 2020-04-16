<?php

namespace App\Controller\admin\tag;

use App\Entity\Tag;
use App\Form\TagType;
use App\Repository\TagRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
  /**
   * @Route("admin/tagList", name="tag_list")
   * @param TagRepository $repository
   * @return Response
   */
  public function tagList(TagRepository $repository)
  {
    $tags = $repository->findAll();
    return $this->render('admin/tag/TagList.html.twig', [
      'tags' => $tags
    ]);
  }


  /**
   * @Route("/admin/tag/new", name="tag_new")
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse|Response
   */
  public function new(Request $request, EntityManagerInterface $manager)
  {
    $tag = new Tag();
    $form = $this->createForm(TagType::class, $tag);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->persist($tag);
      $manager->flush();
      $this->addFlash('success', 'Created with success');
      return $this->redirectToRoute('tag_list');
    }
    return $this->render('admin/tag/New.html.twig', [
      'form' => $form->createView()
    ]);
  }

  /**
   * @Route("/admin/tag/{id}", name="tag_edit", methods="GET|POST")
   * @param Tag $tag
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse|Response
   */
  public function edit(Tag $tag, Request $request, EntityManagerInterface $manager)
  {
    $form = $this->createForm(TagType::class, $tag);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->flush();
      $this->addFlash('success', 'Updated with success');
      return $this->redirectToRoute('tag_list');
    }
    return $this->render('admin/tag/Edit.html.twig', [
      'form' => $form->createView()
    ]);
  }

  /**
   * @Route("/admin/tag/delete/{id}", name="tag_delete", methods="DELETE")
   * @param Tag $tag
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse
   */
  public function delete(Tag $tag, Request $request, EntityManagerInterface $manager)
  {
    if ($this->isCsrfTokenValid('delete' . $tag->getId(), $request->get('_token'))) {
      $manager->remove($tag);
      $manager->flush();
      $this->addFlash('success', 'Deleted with success');
    }
    return $this->redirectToRoute('tag_list');
  }
}
