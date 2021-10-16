<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/catalogues', name: 'catalogues')]
    public function index(BookRepository $repo): Response
    {
        return $this->render('book/book.html.twig', [
            'books' => $repo->findAll(),
        ]);
    }
    #[Route('/catalogues/create', name: 'create', methods: ['GET','POST'])]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createFormBuilder()
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('author', TextType::class)
            ->add('kind', TextType::class)
            ->add('releasedate', DateType::class)
            ->add('available', ChoiceType::class, [
                'choises' => [
                    'Disponible' => true,
                    'Non disponible' => false,
                ]
            ])
            ->add('picture', FileType::class)
            ->add('submit', SubmitType::class, ['label' => 'Ajouté un livre'])
            ->getForm()
        ;
        return $this->render('book/createbook.html.twig', [
            'controller_name' => 'CreateBookController',
            'createFormulaire' => $form->createView()
        ]);
    }
}
