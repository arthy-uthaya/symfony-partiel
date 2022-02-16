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


}
