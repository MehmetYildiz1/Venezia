<?php


namespace App\Controller;


use App\Entity\Ijsrecept;
use App\Form\Type\IjsreceptType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BezoekerController extends AbstractController
{
    /**
     * @Route("/home", name="homepage")
     */
    public function home()
    {
        return $this->render('bezoeker/home.html.twig');

    }

    /**
     * @Route("/info", name="informatie")
     */
    public function Contactgegevens()
    {
        return $this->render('bezoeker/informatie.html.twig');

    }

    /**
     * @Route("/ijs", name="ijs_show")
     */
    public function showIjsLijst()
    {
        $ijsrep = $this->getDoctrine()
            ->getRepository(Ijsrecept::class)
            ->findAll();

        if (!$ijsrep) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this->render('bezoeker/ijs.html.twig', ['ijsrep' => $ijsrep]);
    }

    /**
     * @Route("/ijsAanbod", name="ijs_aanbod")
     */
    public function showIjsAanbod()
    {
        $ijsrep = $this->getDoctrine()
            ->getRepository(Ijsrecept::class)
            ->findAll();

        if (!$ijsrep) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this->render('bezoeker/ijsAanbod.html.twig', ['ijsrep' => $ijsrep]);
    }

}