<?php

namespace App\Controller;

use App\Entity\Memo;
use App\Form\MemoType;
use App\Repository\MemoRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MemoController extends AbstractController
{


   
    /**
     * @Route("/memo", name="memo.test")
     */
    public function index(MemoRepository $memoRepo): Response
    {

        $memos = $memoRepo->findAllMemos();

        return $this->render('memo/index.html.twig', [
            'controller_name' => 'MemoController',
            'memos'=>$memos
        ]);
    }

        /**
     * @Route("/memo/{id}", name="memo.add", methods={"GET", "POST"})
     * @IsGranted("ROLE_USER")
     * @return Response
     */
    public function new(Request $request): Response
    {
        $memo = new Memo();
        $form = $this->createForm(MemoType::class, $memo);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($memo);
            $entityManager->flush();

            $this->addFlash('success', 'Le mémo a bien été ajotuée.');
            return $this->redirectToRoute('memo');
        }

        return $this->render('category/new.html.twig', [
            'category'=>$memo,
            'form'=>$form->createView()
        ]);
    }


}
