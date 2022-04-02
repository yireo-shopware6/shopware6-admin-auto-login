<?php declare(strict_types=1);

namespace Yireo\AdminAutoLogin\TwigGlobal;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class LoginTokenData
{
    private string $username;
    private string $password;
    private UrlGeneratorInterface $router;

    public function __construct(
        UrlGeneratorInterface $router,
        string $username,
        string $password
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->router = $router;
    }

    public function get(): ?array
    {
        $username = $this->username;
        $password = $this->password;
        $url = $this->router->generate('api.oauth.token', [], urlGeneratorInterface::ABSOLUTE_URL);

        if (empty($username) || empty($password)) {
            return [
                'errors' => [
                    'Username and password are not set'
                ]
            ];
        }

        $data = [
            'grant_type' => 'password',
            'client_id' => 'administration',
            'scopes' => 'write',
            'username' => $username,
            'password' => $password,
        ];

        $client = new Client();
        try {
            $loginResponse = $client->post($url, [
                RequestOptions::JSON => $data
            ]);
        } catch (GuzzleException $e) {
            return [
                'error' => $e->getMessage()
            ];
        }

        $data = json_decode($loginResponse->getBody()->getContents(), true);
        return [
            'access' => $data['access_token'],
            'refresh' => $data['refresh_token'],
            'expiry' => $data['expires_in'],
        ];
    }
}
