<?php

namespace App\Tests;

use App\Controller\StudentController;
use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class StudentControllerTest extends KernelTestCase
{
    private function DeserializeArray($obj, $class)
    {
        $serializer = new Serializer([new GetSetMethodNormalizer(), new ArrayDenormalizer()], [new JsonEncoder()]);

        return ($serializer->deserialize($obj, $class . "[]", 'json'));
    }

    public function testStudentCount(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        $controller = static::getContainer()->get(StudentController::class);

        $r = $controller->index()->getContent();
        $r = $this->DeserializeArray($r, Student::class);

        $this->assertSame(4, count($r));

        //$routerService = static::getContainer()->get('router');
        //$myCustomService = static::getContainer()->get(CustomService::class);
    }
}
