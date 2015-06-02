<?php

namespace Assignment\SportBundle\Tests\Services;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Assignment\SportBundle\Services\Exercise;
use Assignment\SportBundle\Entity\User;
use Assignment\SportBundle\Entity\Exercise as ExerciseEntity;
use Doctrine\ORM\EntityRepository;

/**
 * Class ExerciseTest
 *
 * @group unit
 */

class ExerciseTest extends WebTestCase
{
    /**
     * @dataProvider getListProvider
     */
    public function testGetList($data)
    {
        $service = new Exercise($this->mockRepository($data));
        $this->assertEquals($data, $service->getList(new User()));
    }


    public function getListProvider()
    {
        return array(
            array(
                array(new ExerciseEntity())
            )
        );
    }

    /**
     * @param $returnData
     *
     * @return EntityRepository
     */
    private function mockRepository($returnData)
    {
        $repository = $this->getMockBuilder('Doctrine\ORM\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();

        $repository->expects($this->once())
            ->method('findBy')
            ->will($this->returnValue($returnData));

        return $repository;
    }
}
