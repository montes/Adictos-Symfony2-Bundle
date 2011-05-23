<?php
namespace Montes\AdictosBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StoreControllerTest extends WebTestCase
{
    public function testStore()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/adictos/pepe');
        $this->assertTrue($crawler->filter('html:contains'.
            '("So you want store pepe?")')->count() > 0);
    }
}