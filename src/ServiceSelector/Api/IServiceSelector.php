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

namespace Base3\CoreFoundation\ServiceSelector\Api;

/**
 * Interface IServiceSelector
 *
 * Defines the entry point for a routed request. The `go()` method is responsible
 * for handling the request and returning the complete response content.
 */
interface IServiceSelector {

	/**
	 * Executes the selected service logic and returns the full response content.
	 *
	 * This is the final rendered output (e.g. full HTML page, JSON response, etc.).
	 *
	 * @return string Rendered response content
	 */
	public function go(): string;

}

