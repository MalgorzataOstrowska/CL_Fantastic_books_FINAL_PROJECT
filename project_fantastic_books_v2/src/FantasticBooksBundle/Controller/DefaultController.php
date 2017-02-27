<?php

namespace FantasticBooksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('FantasticBooksBundle:Default:index.html.twig');
    }

    /**
     * @Route("/concatData", name="concat_data")
     */
    public function concatenateAction(Request $request)
    {
echo '<pre>';
        print_r($_GET);
die;
    }
}
