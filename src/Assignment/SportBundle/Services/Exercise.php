<?php

namespace Assignment\SportBundle\Services;

use Doctrine\ORM\EntityRepository;
use Assignment\SportBundle\Entity\User;

class Exercise
{
    /**
     * @var EntityRepository
     */
    private $exerciseRepository;

    public function __construct(EntityRepository $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    /**
     * Get list of exercises by user
     *
     * @param User $user
     *
     * @return mixed
     */
    public function getList(User $user)
    {
        return $this->exerciseRepository->findBy(['user' => $user]);
    }
}
