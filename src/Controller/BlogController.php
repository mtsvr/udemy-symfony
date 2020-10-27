<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog")
 */
class BlogController extends AbstractController {
  private const POSTS = [
    [
      "id" => 1,
      "slug"=>"hello-world",
      "title"=>"hello world"
    ],
    [
      "id" => 2,
      "slug"=>"another-post",
      "title"=>"Another Post"
    ]
  ];

  /**
   * @Route("/{page}", name="blog_list", defaults={"page": 1})
   */
  public function list($page = 1, Request $request) {
    $limit = $request->get('limit', 10);

    return $this->json(
      [
        'page' => $page,
        'limit' => $limit,
        'data' => array_map(function($item) {
          return $this->generateUrl('blog_by_id', ['id' => $item['id']]);
        }, self::POSTS)
      ]
    );
  }

  /**
   * @Route("/post/{id}", name="blog_by_id", requirements={"id"="\d+"})
   */
  public function post($id) {
    return $this->json(
      self::POSTS[array_search($id, array_column(self::POSTS, "id"))]
    );
  }

  /**
   * @Route("/post/{slug}", name="post_by_slug")
   */
  public function postBySlug($slug) {
    return $this->json(
      self::POSTS[array_search($slug, array_column(self::POSTS, "slug"))]
    );
  }

}