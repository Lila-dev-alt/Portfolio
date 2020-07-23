<?php

namespace App\Controller;

use App\Entity\Education;
use App\Entity\Skill;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
        $educations = $educationRepository->findAll();
        return $this->render('home/my_projects.html.twig', [
            'controller_name' => 'HomeController',
            'educations'      =>  $educations,
        ]);
    }
}
