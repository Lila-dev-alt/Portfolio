<?php

namespace App\Controller;

use App\Entity\Education;
use App\Entity\Project;
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
}
