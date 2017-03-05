<?php

namespace FantasticBooksBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShowCharacterControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'character/index');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'character/show/{id}');
    }

    public function testShowchosen()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'character/showChosen/{chosen}');
    }

}
