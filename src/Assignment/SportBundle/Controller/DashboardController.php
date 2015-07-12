<?php

namespace Assignment\SportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

        // todo: it's much better to filter data in DB level but not in PHP.
        // you can use entity repository to create custom querys with needed filtering
        foreach ($list as $exercise) {
            if ($exercise->getDate()->format('Y-m-d') == $today) {
                $todayEx[] = $exercise;
            } elseif ($exercise->getDate()->format('Y-m-d') == $weekAgo) {
                $weekAgoEx[] = $exercise;
            } elseif ($exercise->getDate()->format('Y-m-d') == $twoWeekAgo) {
                $twoWeekAgoEx[] = $exercise;
            }
        }

        $maxCount = max(count($todayEx), count($weekAgoEx), count($twoWeekAgoEx));

        // todo: use constants for key names (here and in view file) or create simple object with getters/setters
        return array(
            'todayEx' => $todayEx,
            'weekAgoEx' => $weekAgoEx,
            'twoWeekAgoEx' => $twoWeekAgoEx,
            'maxCount' => $maxCount
        );
    }
}
