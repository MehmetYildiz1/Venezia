<?php


namespace App\Controller;


use App\Entity\Bestelregel;
use App\Entity\Ijsrecept;
use App\Form\Type\IjsreceptType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class IjsmakerController extends AbstractController
{
    /**
     * @Route("/ijsrepToev", name="ijsrep_toev")
     */
    public function new(Request $request)
    {
        // just setup a fresh $task object (remove the example data)
        $ijsrep = new Ijsrecept();

        $form = $this->createForm(IjsreceptType::class, $ijsrep);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            // but, the original `$task` variable has also been updated
            $ijsrep = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ijsrep);
            $entityManager->flush();

            return $this->redirectToRoute('ijs_show');
        }

        return $this->render('ijsmaker/addIjsrecept.html.twig', [
            'form' => $form->createView(),
        ]);
    }

//    /**
//     * @Route("/product/{id}")
//     */
//    public function update(Request $request, $id)
//    {
//
//        $product = $this->getDoctrine()->
//        getRepository(Product::class)->find($id);
//
//        if (!$product) {
//            throw $this->createNotFoundException(
//                'No product found for id '.$id
//            );
//        }
//        $form = $this->createForm(TaskType::class, $product);
//
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $form->getData();
//            // but, the original `$task` variable has also been updated
//            $product = $form->getData();
//
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($product);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('task_success');
//        }
//
//        return $this->redirectToRoute('product_show', [
//            'id' => $product->getId()
//        ]);
//    }

    /**
     * @Route("/ijs/{id}", name="update_ijsrep")
     */
    public function updateIjsrep(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $ijsrep = $entityManager->getRepository(Ijsrecept::class)->find($id);

        if (!$ijsrep) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $form = $this->createForm(IjsreceptType::class, $ijsrep);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            // but, the original `$task` variable has also been updated
            $ijsrep = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ijsrep);
            $entityManager->flush();

            return $this->redirectToRoute('ijs_show');
        }

        return $this->render('ijsmaker/addIjsrecept.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/deleteIjs/{id}", name="delete")
     */
    public function deleteIjsrep($id)
    {

        $ijsrep = $this->getDoctrine()->getRepository
        (Ijsrecept::class)->find($id);

        if (!$ijsrep) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($ijsrep);
        $entityManager->flush();

        return $this->redirectToRoute('ijs_show');
    }

//    /**
//     * @Route("/product", name="product_show")
//     */
//    public function show()
//    {
//        $product = $this->getDoctrine()
//            ->getRepository(Product::class)
//            ->findAll();
//
//        if (!$product) {
//            throw $this->createNotFoundException(
//                'No product found for id '.$id
//            );
//        }
//
//        // or render a template
//        // in the template, print things with {{ product.name }}
//        return $this->render('product/show.html.twig', ['product' => $product]);
//    }

    /**
     * @Route("/bestelregelList", name="bestelregel_list")
     */
    public function show()
    {
        $bestelreg = $this->getDoctrine()
            ->getRepository(Bestelregel::class)
            ->findall();

        if (!$bestelreg) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('ijsmaker/bestelregelList.html.twig', ['bestelreg' => $bestelreg]);
    }

}