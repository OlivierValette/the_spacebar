<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }
    
    /**
     * @Route("/news/{slug}", name="article_show")
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        $comments = [
            'I ate a normal rock once, It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site bakinsomebacon.com'
        ];
        
        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments,
        ]);
    }
    
    /**
     * @\Route("/news/{slug}/heart", name="article_toggle_heart")
     */
    public function toggleArticleHeart($slug)
    {
        // TODO - actually heart/unheart the article!
        
        return new JsonResponse(['hearts' => rand(5, 100)]);
    }
}