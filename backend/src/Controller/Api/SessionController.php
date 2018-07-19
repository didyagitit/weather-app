<?php

namespace App\Controller\Api;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
* @Route("/api/session")
*/
class SessionController extends Controller
{
    /**
    * @var UserRepository
    */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * @Route("/create", name="session_create", methods={"POST"})
     */
    public function create(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $data = json_decode($request->getContent());

        // Simplified version of login
        $user = $this->userRepository->findOneBy([
          'email' => $data->email
        ]);

        if (!$user) {
          return $this->json([
            'message' => 'User not found'
          ], Response::HTTP_UNAUTHORIZED);
        }

        return $this->json([
          'message' => 'User successfully logged in'
        ], Response::HTTP_OK);
    }

    /**
    * @Route("/destroy", name="session_destroy", methods={"DELETE"})
    */
    public function destroy()
    {
        return $this->json([
          'message' => 'User successfully logged out'
        ], Response::HTTP_OK);
    }
}
