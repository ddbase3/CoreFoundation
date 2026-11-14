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

namespace Base3\CoreFoundation\Xrm;

use Base3\CoreFoundation\Xrm\Api\IXrmFilterModule;

abstract class AbstractXrmFilterModule implements IXrmFilterModule {

	// Protected methods

	protected function sliceList($elements, $offset, $limit) {

/*
		usort($elements, function($a, $b) {
			if (substr($a, 0, 2) == "xx") return 1;
			if (substr($b, 0, 2) == "xx") return -1;
			return 0;
		});
*/

		if ($offset == null && $limit == null) return $elements;
		if ($limit == null) return array_slice($elements, intval($offset));
		return array_slice($elements, intval($offset), intval($limit));
	}

}
