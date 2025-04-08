<?php

/**
 * This file is part of the Lean Mapper library (https://www.leanmapper.com)
 *
 * Copyright (c) 2013 Vojtěch Kohout (aka Tharos)
 *
 * For full copyright and license information, please see the LICENSE file
 * that was distributed with this source code.
 */

namespace LeanMapper;

/**
 * @author Vojtěch Kohout
 */
class Caller
{
	/** @var mixed */
	private $instance;

	/** @var mixed */
	private $complement;

	/**
	 * @param mixed      $instance
	 * @param mixed|null $complement
	 */
	public function __construct($instance, $complement = null)
	{
		$this->instance = $instance;
		$this->complement = $complement;
	}

	/**
	 * @return mixed
	 */
	public function getInstance()
	{
		return $this->instance;
	}

	/**
	 * @return mixed|null
	 */
	public function getComplement()
	{
		return $this->complement;
	}

	/**
	 * @return bool
	 */
	public function isEntity()
	{
		return $this->instance instanceof Entity;
	}

	/**
	 * @return bool
	 */
	public function isRepository()
	{
		return $this->instance instanceof Repository;
	}
}
