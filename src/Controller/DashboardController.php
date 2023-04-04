<?php
  
namespace App\Controller;
  
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api_')]
class DashboardController extends AbstractController
{
        private $repository;
        
        public function __construct(EntityManagerInterface $entityManager)
        {
                $this->repository = $entityManager->getRepository(User::class);
        }

        
        /* show All Users with (Order by, Sort type) */
        #[Route('/all/{orderBy?id}/{sort?asc}', name: 'all_users', priority: 1)]
        public function all_users(Request $request): Response
        {
                /* get attributes */
                $sort = $request->attributes->get('_route_params')['sort'];
                $orderBy = $request->attributes->get('_route_params')['orderBy'];

                /* queries */
                try
                {
                        $users = $this->repository->findBy([], [$orderBy => $sort]);

                }
                catch(Exception $e)
                {
                        /* return - error: wrong parameters */
                        return $this->json('ERROR: WRONG PARAMETERS');

                }

                /* json output - info */
                $jsonInfo[] = [ 
                        'total_items' =>  count($users)
                ];
                
                $data['api_info'] = $jsonInfo;


                /* json output - data */
                foreach($users as $user)
                {
                        $jsonData[] = [
                                'id' => $user->getId(),
                                'username' => $user->getUsername(),
                                'email' => $user->getEmail(),
                                'roles' => $user->getRoles()
                        ];

                        $data['api_items'] = $jsonData;

                }

                /* return - results */
                return $this->json($data);

        }


        /* show Users with (Page, Items per page, Order by, Sort type) */
        #[Route('/users/{page<\-?\d+(?:\.\d+)?+>?1}/{itemsPerPage<\d+>?10}/{orderBy?id}/{sort?asc}', name: 'users_pagination', priority: 1)]
        public function users(Request $request): Response
        {
                /* get attributes */
                $currentPage = (int)$request->attributes->get('_route_params')['page'];
                $itemsPerPage = (int)$request->attributes->get('_route_params')['itemsPerPage'];
                $sort = $request->attributes->get('_route_params')['sort'];
                $orderBy = $request->attributes->get('_route_params')['orderBy'];

                /* pagination */
                $offset = ($currentPage-1) * $itemsPerPage;
                $limit = $itemsPerPage;

                /* queries */
                try
                {
                        $users = $this->repository->findBy([], [$orderBy => $sort], $limit, $offset);
                        $count = $this->repository->findBy([], [$orderBy => $sort]);

                }
                catch(Exception $e)
                {
                        /* return - error: wrong parameters */
                        return $this->json('ERROR: WRONG PARAMETERS');
                }


                /* json output - info */
                $jsonInfo[] = [ 
                        'total_page' => ceil(count($count) / $itemsPerPage),
                        'current_page' => $currentPage,
                        'total_items' =>  count($count),
                        'items_per_page' => $itemsPerPage,
                        'displayed_items' => count($users)
                ];

                $data['api_info'] = $jsonInfo;


                /* json output - data */
                foreach($users as $user)
                {
                        $jsonData[] = [
                                'id' => $user->getId(),
                                'username' => $user->getUsername(),
                                'email' => $user->getEmail(),
                                'roles' => $user->getRoles()
                        ];

                        $data['api_items'] = $jsonData;

                }


                /* out of range check */
                if(count($users) > 0)
                {
                        /* return - results */
                        return $this->json($data);

                }
                else
                {
                        /* return - error: items not found */
                        return $this->json('ERROR: ITEMS NOT FOUND');
                        
                }
                
        }

    // error page
    #[Route('/{errorPage<.+>?}', name: 'error_page')]
    public function error_page(Request $request): Response
    {
            $errorPage = $request->attributes->get('_route_params')['errorPage'];
            // return - error: api page not found
            return $this->json('ERROR: API PAGE NOT FOUND!');

    }
    
}