<?php

/**
 * This file is part of the Lean Mapper library (https://www.leanmapper.com)
 *
 * Copyright (c) 2013 Vojtěch Kohout (aka Tharos)
 *
 * For full copyright and license information, please see the LICENSE file
 * that was distributed with this source code.
 */

namespace LeanMapper\Reflection;

/**
 * Property type
 *
 * @author Vojtěch Kohout
 */
class PropertyType
{
	/** @var string */
	private $type;

	/** @var bool */
	private $isBasicType;

	/**
	 * @param string  $type
	 * @param Aliases $aliases
	 */
	public function __construct($type, Aliases $aliases)
	{
		if (preg_match('#^(boolean|bool|integer|int|float|string|array)$#', $type)) {
			if ($type === 'bool') {
				$type = 'boolean';
			}
			if ($type === 'int') {
				$type = 'integer';
			}
			$this->isBasicType = true;
		} else {
			if (substr($type, 0, 1) === '\\') {
				$type = substr($type, 1);
			} else {
				$type = $aliases->translate($type);
			}
			$this->isBasicType = false;
		}
		$this->type = $type;
	}

	/**
	 * Gets type
	 *
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Tells whether current type is basic type (boolean|integer|float|string|array)
	 *
	 * @return bool
	 */
	public function isBasicType()
	{
		return $this->isBasicType;
	}
}
