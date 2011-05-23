<?php

namespace Montes\AdictosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class StoreController extends Controller
{
    /**
     * @Template()
     **/
    public function indexAction($store)
    {
        return array('store' => $store);
    }
}
