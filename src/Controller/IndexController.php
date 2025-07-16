<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            
        ]);
    }

    #[Route('/articles', name: 'app_first_page')]
    public function firstPage(): Response
    {
        return $this->render('index/articles.html.twig', [
            
        ]);
    }

    #[Route('/article/{id}', name: 'app_one_article', requirements: ['id' => '\d+'])]
    public function articleByOffer(int $id): Response
    {
        $products = [
            1 => [
                'id' => 1,
                'img' => 'assets/img/photo_noel_gode.png',
            ],
            2 => [
                'id' => 2,
                'img' => 'assets/img/gode_tour_milka.png',
            ],
            3 => [
                'id' => 3,
                'img' => 'assets/img/gode_confetti_milka.png',
            ],
            4 => [
                'id' => 4,
                'img' => 'assets/img/gode_ventouseMilka.png',
            ],
            5 => [
                'id' => 5,
                'img' => 'assets/img/menotte_roseMilka.png',
            ],
            6 => [
                'id' => 6,
                'img' => 'assets/img/photo_noel_gode.png',
            ],
        ];
        
        if (!isset($products[$id])) {
            throw $this->createNotFoundException('Produit non trouvé');
        }
        
        $product = $products[$id];
        
        return $this->render('index/article.html.twig', [
            'product' => $product
        ]);
    }
}
