<?php


namespace App\Controller;

# setup by phpstrom might be wrong!!!
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController
{


    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('First Controller Response');
    }

    /**
     * @Route("/news/{slug}")
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'Future page to show the article: %s',
                            $slug)
        );
    }
}