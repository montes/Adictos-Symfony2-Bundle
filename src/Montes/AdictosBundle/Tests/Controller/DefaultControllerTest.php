<?php
namespace Montes\AdictosBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/adictos');
        $this->assertTrue($crawler->filter('html:contains'.
            '("Welcome to AdictosBundle Default Controller!")')->count() > 0);
    }
}
