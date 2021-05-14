<?php 

namespace App\Controller ;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController 
{

    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;

    }


    /**
     * 
     * @Route("library/list", name="library_list")
     */

     public function list(Request $request) {

        $title = $request->get('title', 'default');
        $this->logger->info('List action called');
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
