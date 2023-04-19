<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];

        //render returns a Response object. controllers must always return a response object
        return $this->render('vinyl/homepage.html.twig',[
            'title' => 'PB and Jams',
            'tracks' => $tracks
        ]);
    }

    //wildcard route. the $slug = null makes the slug options. so just /browse will still work
    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if($slug) {
            $title = u(str_replace('-', ' ', $slug))->title(true);
        }else{
            $title = 'All';
        }

        return new Response($title);
    }
}