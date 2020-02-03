<?php

namespace App\Entity;

class Sender
{

	private $name;

	private $photo;

	private $lat;

	private $lon;

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getPhoto()
	{
		return $this->photo;
	}

	/**
	 * @return string
	 */
	public function getPublicUrl()
	{
		return getenv('PUBLIC_URL') . getenv('IMAGES_PUBLIC_URL') . '/' . $this->photo;
	}

	/**
	 * @param string $photo
	 */
	public function setPhoto($photo)
	{
		$this->photo = $photo;
	}

	/**
	 * @return float
	 */
	public function getLat()
	{
		return $this->lat;
	}

	/**
	 * @param float $lat
	 */
	public function setLat($lat)
	{
		$this->lat = $lat;
	}

	/**
	 * @return float
	 */
	public function getLon()
	{
		return $this->lon;
	}

	/**
	 * @param float $lon
	 */
	public function setLon($lon)
	{
		$this->lon = $lon;
	}



}