<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class BookController extends AbstractController
{
    #[Route('/', name: 'app_catalogues')]
    public function index(BookRepository $repo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('book/book.html.twig', [
            'books' => $repo->findAll(),
        ]);
    }

    /**
     * @Route("/about}", name="app_about")
     */
    public function about(): Response
    {
        return $this->render('about.html.twig', [
        ]);
    }

    #[Route('/create', name: 'app_create', methods: ['GET','POST'])]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $form = $this->createFormBuilder()
            ->add('title', TextType::class, ['attr' => ['autofocus' => true]])
            ->add('description', TextareaType::class)
            ->add('author', TextType::class)
            ->add('kind', TextType::class)
            ->add('releasedate', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('available', ChoiceType::class, [
                'choices' => [
                    'Disponible' => true,
                    'Réserver' => false,
                ]
            ])
            ->add('picture', TextType::class)
            ->getForm()
            ;

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();

                $book = new Book;
                $book->setTitle($data['title']);
                $book->setDescription($data['description']);
                $book->setAuthor($data['author']);
                $book->setKind($data['kind']);
                $book->setReleaseDate($data['releasedate']);
                $book->setAvailable($data['available']);
                $book->setPicture($data['picture']);
                $em->persist($book);
                $em->flush();

                return $this->redirectToRoute('app_show', ['id' => $book->getId()]);
            }
        ;
        return $this->render('book/createbook.html.twig', [
            'controller_name' => 'CreateBookController',
            'createBook' => $form->createView()
        ]);
    }

    /**
     * @Route("/catalogues/{id}", name="app_show")
     */
    public function show(BookRepository $repo, int $id): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $book = $repo->find($id);

        if ($book === null) {
            throw $this->createNotFoundException( 'Pas de livre #' . $id . ' trouvé');
        }

        return $this->render('book/show.html.twig', compact('book'));
    }
}
