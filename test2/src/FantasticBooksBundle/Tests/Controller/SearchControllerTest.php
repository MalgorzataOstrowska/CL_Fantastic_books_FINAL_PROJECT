<?php

namespace FantasticBooksBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SearchControllerTest extends WebTestCase
{
    public function testSearchcharacter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/searchCharacter');
    }

}
