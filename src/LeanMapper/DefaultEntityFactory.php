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
 * Default IEntityFactory implementation
 *
 * @author Vojtěch Kohout
 */
class DefaultEntityFactory implements IEntityFactory
{
	/**
	 * @inheritdoc
	 */
	public function createEntity($entityClass, $arg = null)
	{
		return new $entityClass($arg);
	}

	/**
	 * @inheritdoc
	 */
	public function createCollection(array $entities)
	{
		return $entities;
	}
}
