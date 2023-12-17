<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompanyControllerTest extends WebTestCase
{
    public function testCreateCompany(): void
    {
        $client = static::createClient();
        $crawler = $client->request(
            'POST',
            '/api/companies',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode(['Raison_sociale' => 'Company name', 'Siren' => '987654321', 'Adresse' => ['Num' => 1, 'Voie' => 'rue', 'Code_postal' => '12345', 'Ville' => 'city',  'GPS' => ['Latitude' => '45.6', 'Longitude' => '5.78']]])
        );

        $this->assertResponseIsSuccessful();
        $this->assertEquals('Entreprise créée', $client->getResponse()->getContent());
    }
}
