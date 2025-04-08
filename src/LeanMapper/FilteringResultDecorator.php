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
class FilteringResultDecorator
{
	/** @var FilteringResult */
	private $filteringResult;

	/** @var array */
	private $baseArgs;

	/**
	 * @param FilteringResult $filteringResult
	 * @param array           $baseArgs
	 */
	public function __construct(FilteringResult $filteringResult, array $baseArgs)
	{
		$this->filteringResult = $filteringResult;
		$this->baseArgs = $baseArgs;
	}

	/**
	 * @return Result
	 */
	public function getResult()
	{
		return $this->filteringResult->getResult();
	}

	/**
	 * @param  array $relatedKeys
	 * @param  array $args
	 * @return bool
	 */
	public function isValidFor(array $relatedKeys, array $args)
	{
		if (!$this->filteringResult->hasValidationFunction()) {
			return true;
		}
		return call_user_func_array(
			$this->filteringResult->getValidationFunction(),
			array_merge([$relatedKeys], $this->baseArgs, $args)
		);
	}
}
