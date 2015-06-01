<?php

namespace Assignment\SportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     * @Template()
     */
    public function indexAction()
    {
        $list = $this->container->get('sport.exercise')->getList($this->getUser());
        $todayEx = $weekAgoEx = $twoWeekAgoEx = array();

        $today = date('Y-m-d', strtotime("today"));
        $weekAgo = date('Y-m-d', strtotime("-7 days"));
        $twoWeekAgo = date('Y-m-d', strtotime("-14 days"));

        foreach ($list as $exersice) {

            if ($exersice->getDate()->format('Y-m-d') == $today) {
                $todayEx[] = $exersice;
            } elseif ($exersice->getDate()->format('Y-m-d') == $weekAgo) {
                $weekAgoEx[] = $exersice;
            } elseif ($exersice->getDate()->format('Y-m-d') == $twoWeekAgo) {
                $twoWeekAgoEx[] = $exersice;
            }

        }

        $maxCount = max(count($todayEx), count($weekAgoEx), count($twoWeekAgoEx));
        return array('todayEx' => $todayEx,
            'weekAgoEx' => $weekAgoEx,
            'twoWeekAgoEx' => $twoWeekAgoEx,
            'maxCount' => $maxCount
        );
    }
}
