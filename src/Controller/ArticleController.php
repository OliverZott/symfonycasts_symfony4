<?php


namespace App\Controller;

# setup by PhpStorm might be wrong!!!
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class ArticleController extends AbstractController
{


    /**
     * @Route("/")
     *
     * without auto-wiring
     * @param Environment $twgEnvironment
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function homepage(Environment $twgEnvironment)
    {

        $html = $twgEnvironment->render('article/homepage.html.twig');
        return new Response($html);

        // return $this->render('article/homepage.html.twig');
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
    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        // TODO - actually heart / unheart article

        $logger->info('Article is being hearted');

        // subclass of response (calls json_encode automatically!)
        return new JsonResponse(['hearts' => rand(5, 100)]);

        // Controller shortcut:
        // return $this->json(['hearts' => rand(5, 100)]);

        // to long:
        // return new Response(json_encode(['heart' => 5]));


    }
}