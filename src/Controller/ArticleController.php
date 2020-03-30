<?php


namespace App\Controller;

# setup by PhpStorm might be wrong!!!
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends AbstractController
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
        /* old version
        new Response(sprintf(
            'Future page to show the article: %s',
                            $slug)
        ); */

        $comments = array(
            'Blabla, test comment for twig example',
            'What\'s going to happen ?',
            'Last one of three comments',
        );

        /*
         * second arg is array of variables to pass into template! (e.g. articles from db)
         * test: http://127.0.0.1:8000/news/Wtf-is-happening-here
         */
        return $this->render('article/show.html.twig', array(
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments,
        )
        );
    }
}