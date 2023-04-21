<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
//    methods: ['GET'] makes it so this route only accepts a GET request
//    using regex to make sure we get an integer not a string. for the song id in the url
//      this will throw a 404 error if someone tries to go to /api/songs/apple for example
    #[Route('/api/songs/{id<\d+>}', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        // TODO query the database
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
        ];

        $logger->info('Returing API response for song {song}', [
            'song' => $id
        ]);
//        returns a response that is automatoically json encoded
        return $this->json($song);
    }
}