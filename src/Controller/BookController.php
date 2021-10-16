<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/', name: 'book')]
    public function index(EntityManagerInterface $em): Response
    {
        $repo = $em->getRepository(Book::class);

        $books = $repo->findAll();

        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
            'books'=>$books,
        ]);
    }
}
