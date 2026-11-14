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

namespace Base3\CoreFoundation\Middleware\Api;

/**
 * Interface IMiddleware
 *
 * Defines a middleware component that can process a request and delegate to the next handler.
 */
interface IMiddleware {

	/**
	 * Sets the next middleware or handler in the chain.
	 *
	 * @param mixed $next The next middleware or final handler (typically another IMiddleware or callable)
	 * @return void
	 */
	public function setNext($next);

	/**
	 * Processes the current request and optionally calls the next middleware.
	 *
	 * @return string The response content
	 */
	public function process(): string;

}

