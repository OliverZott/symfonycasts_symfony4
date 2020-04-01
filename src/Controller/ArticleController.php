<?php


namespace App\Controller;

# setup by PhpStorm might be wrong!!!
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends AbstractController
{


    /**
     * @Route("/")
     */
    public function homepage()
    {
        # return new Response('First Controller Response');
        return $this->render('article/homepage.html.twig');
    }


    /**
     * @Route("/news/{slug}", name="article_show")
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
            'slug' => $slug,
            'comments' => $comments,
        )
        );

    }


    /**
     * API Endpoint
     *
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     *
     * - slug - wildcard to refer to respective article
     */
    public function toggleArticleHeart($slug)
    {
        // TODO - actually heart / unheart article


        // subclass of response (calls json_encode automatically!)
        return new JsonResponse(['hearts' => rand(5, 100)]);

        // Controller shortcut:
        // return $this->json(['hearts' => rand(5, 100)]);

        // to long:
        // return new Response(json_encode(['heart' => 5]));


    }
}