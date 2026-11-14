<?php declare(strict_types=1);

/***********************************************************************
 * This file is part of CoreFoundation for BASE3 Framework.
 *
 * CoreFoundation defines the stable shared contracts of BASE3 Framework.
 * It owns framework interfaces, models, DTOs, exceptions and common bases.
 * Concrete core implementations depend on it, never the reverse.
 *
 * Developed by Daniel Dahme
 * Licensed under GPL-3.0
 * https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * https://base3.de
 * https://github.com/ddbase3/Base3Framework
 **********************************************************************/

namespace Base3\CoreFoundation\Xrm\Api;

use Base3\CoreFoundation\Api\IBase;

/**
 * Interface IXrmFilterModule
 *
 * Defines a filter module for XRM entries that can match and apply custom filters.
 */
interface IXrmFilterModule extends IBase {

	/**
	 * Determines how well this filter module matches the given filter request.
	 *
	 * Returns 0 if the module is not suitable. The higher the return value,
	 * the more suitable the module is for handling the filter.
	 *
	 * @param mixed $xrm The XRM instance or context
	 * @param mixed $filter Filter data or structure
	 * @return int Match score (0 = not suitable, higher = better match)
	 */
	public function match($xrm, $filter);

	/**
	 * Applies the filter to the given XRM context and returns the results.
	 *
	 * @param mixed $xrm The XRM instance or context
	 * @param mixed $filter Filter data
	 * @param bool $idsonly Whether to return only IDs instead of full entries
	 * @return array List of matching entries or IDs
	 */
	public function getEntries($xrm, $filter, $idsonly = false);

}

