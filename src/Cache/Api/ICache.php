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

namespace Base3\CoreFoundation\Cache\Api;

/**
 * Interface ICache
 *
 * Provides methods to retrieve cached versions of URLs, with optional refresh.
 */
interface ICache {

	/**
	 * Returns a cached version of the given URL.
	 *
	 * If $refresh is true, the cache may be forcibly updated.
	 *
	 * @param string $url The original URL to be cached
	 * @param bool $refresh Whether to force a cache refresh (default: false)
	 * @return string Cached URL
	 */
	public function getCacheUrl($url, $refresh = false);

	/**
	 * Returns cached versions of multiple URLs.
	 *
	 * If $refresh is true, the cache entries may be refreshed.
	 *
	 * @param array $urls Array of original URLs to be cached
	 * @param bool $refresh Whether to force a cache refresh (default: false)
	 * @return array Array of cached URLs (same order as input)
	 */
	public function getCacheUrls($urls, $refresh = false);

}

