<?php

namespace App\Controller\sandbox;

use App\Repository\ProductRepository;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends AbstractController
{
  private $serializer = null;

  public function __construct()
  {
    $encoders = [new JsonEncoder()];
    $normalizers = [new ObjectNormalizer()];
    $this->serializer = new Serializer($normalizers, $encoders);
  }

  /**
   * @Route("admin/api/tag", name="api_tag", methods="GET")
   * @param TagRepository $tagRepository
   * @return JsonResponse
   */
  public function apiTag(TagRepository $tagRepository)
  {
    $jsonObject = $this->serializeData($tagRepository->findAll());
    return $this->json([$jsonObject], 200);
  }

  /**
   * @Route("admin/api/product", name="api_product", methods="GET")
   * @param ProductRepository $productRepository
   * @return JsonResponse
   */
  public function apiProduct(ProductRepository $productRepository)
  {
    $jsonObject = $this->serializeData($productRepository->findAll());
    return $this->json([$jsonObject], 200);
  }


  private function serializeData($data)
  {
    return $this->serializer->serialize($data, 'json', ['attributes' => ['id', 'name']]);
  }

}
