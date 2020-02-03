<?php

namespace App\Service;

use App\Entity\Sender;
use GuzzleHttp\ClientInterface;


class WebHook
{

	private $targetUrl;

	private $client;

	public function __construct($targetUrl, ClientInterface $httpClient)
	{
		$this->targetUrl = $targetUrl;
		$this->client = $httpClient;
	}

	function run(Sender $sender)
	{

		try {
			$this->client->request('POST', $this->targetUrl, [
				'json' => [
					'photo' => $sender->getPublicUrl(),
					'name' => $sender->getName(),
					'position' => [
						'lon' => $sender->getlon(),
						'lat' => $sender->getlat(),
					]
				]
			]);
		}

		catch (\GuzzleHttp\Exception\GuzzleException $exception) {

			echo 'Couldn\'t send data ' . $exception;

			return false;
		}

		return true;
	}

}