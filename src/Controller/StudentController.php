<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'student')]
    public function index()
    {
        $students = [
            (new Student)->set(1, "VAREILLE", "Nicolas"),
            (new Student)->set(2, "VOUIN", "Anthony"),
            (new Student)->set(3, "ROYEZ", "Charline"),
            (new Student)->set(4, "BAUD", "Robin"),
        ];

        return (new JsonResponse($students));
    }
}
