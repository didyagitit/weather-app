<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
* @Route("/api/user")
*/
class UserController extends Controller
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
    * @Route("/create", name="user_create", methods={"POST"})
    */
    public function create(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $data = json_decode($request->getcontent(), true);

        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->submit($data);

        if ($form->isValid() === false) {
          return $this->json([
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY
          ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $password = $passwordEncoder->encodePassword(
          $user,
          $user->getPlainPassword()
        );

        $user->setPassword($password);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json([
          'status' => Response::HTTP_CREATED
        ], Response::HTTP_CREATED);
    }
}
