<?php 

namespace App\Controller ;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController 
{


    /**
     * 
     * @Route("library/list", name="library_list")
     */

     public function list(Request $request, LoggerInterface $logger) {

        $title = $request->get('title', 'default');
        $logger->info('List action called 2');
         $response = new JsonResponse();
         $response->setData([
             'success' => true,
            'data' => [
                [
                'id' => 1,
                'title' => 'El hobbit'
                ],
                [
                'id' => 1,
                'title' => 'Nocturno de Chile'
                ],
                [
                'id' => 3,
                'title' => $title

                    ]
            ]
         ]);
         return $response;
     }

}
