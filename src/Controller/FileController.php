<?php

namespace App\Controller;

use App\Entity\Sender;
use App\Service\FileUploader;
use App\Service\WebHook;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FileController extends Controller
{

	public function index(Request $request, WebHook $webHook, FileUploader $uploader)
	{

		$photo = $uploader->upload($request->files->get('image'));

		$sender = new Sender();
		$sender->setPhoto($photo);
		$sender->setName($request->get('name'));
		$sender->setLat($request->get('lat'));
		$sender->setLon($request->get('lon'));

		$webHook->run($sender);

		return new Response('true');
	}
}