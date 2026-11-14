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

namespace Base3\CoreFoundation\Route\Api;

/**
 * Contract for a route.
 * Implementations receive dependencies via constructor (DI).
 */
interface IRoute {

	/**
	 * Check if the given path matches this route.
	 *
	 * @param string $path Absolute path from REQUEST_URI without query string (leading slash included).
	 * @return array|null Associative match data on success, or null if not matched.
	 */
	public function match(string $path): ?array;

	/**
	 * Produce the final response body (implementations may set HTTP headers).
	 *
	 * @param array $match Match data previously returned by match().
	 * @return string Response body.
	 */
	public function dispatch(array $match): string;
}

