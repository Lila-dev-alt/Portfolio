<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Education;
use App\Entity\Project;
use App\Entity\Skill;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $skillRepository = $this->getDoctrine()->getRepository(Skill::class);
        $skills = $skillRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'skills'         =>    $skills
        ]);
    }
    /**
     * @Route("/my-projects", name="my_projects")
     */
    public function showProjects()
    {
        $educationRepository = $this->getDoctrine()->getRepository(Education::class);
        $kedge = $educationRepository->findOneBy(['school' => "Kedge Business School"] );
            $wild = $educationRepository->findOneBy(['school' => "Wild Code School"]);
        $projectRepository = $this->getDoctrine()->getRepository(Project::class);
        $dbf = $projectRepository->findOneBy(['name' => "Easy-auto"] );
        $music = $projectRepository->findOneBy(['name' => "Wild Playlist"] );
        $serie = $projectRepository->findOneBy(['name' => "Wild-series"] );
        $circus = $projectRepository->findOneBy(['name' => "Wild Circus"] );

        return $this->render('home/my_projects.html.twig', [
            'controller_name' => 'HomeController',
            'kedge'      =>  $kedge,
            'wild'       => $wild,
            'easy_auto' => $dbf,
            'music'     => $music,
            'serie'     => $serie,
            'circus'    => $circus,
        ]);
    }

    /**
     * @Route("/form_contact" ,  name="contact_me" , methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return RedirectResponse|Response
     */
    public function contact(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();

        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            // but, the original `$task` variable has also been updated
            $contact = $form->getData();
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($contact);
             $entityManager->flush();

            return $this->redirectToRoute('contact_me');
        }
        return $this->render('home/form.html.twig', [
            'controller_name' => 'HomeController',
            'form'     => $form->createView(),
        ]);
    }
}
