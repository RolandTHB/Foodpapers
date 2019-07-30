<?php
namespace App\Tests;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
class SecurityTest extends WebTestCase
{
    public function register($client)
    {
        $crawler = $client->request('GET', '/register');
        $form = $crawler->selectButton('Register')->form();
        $form['registration_form[email]'] = 'test@test.com';
        $form['registration_form[plainPassword]'] = 'azerty';
        $client->submit($form);
        $client->request('GET', '/default');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    public function login($client)
    {
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Sign in')->form();
        $form['email'] = 'test@test.com';
        $form['password'] = 'azerty';
        $client->submit($form);
        $client->request('GET', '/default');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testSecurity()
    {
        $client = static::createClient();
        $this->register($client);
        $this->login($client);

    }
}
?>