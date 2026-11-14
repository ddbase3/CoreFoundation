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

namespace Base3\CoreFoundation\Api;

/**
 * Interface IAssetResolver
 *
 * Resolves internal plugin asset paths to public-facing asset URLs.
 */
interface IAssetResolver {

	/**
	 * Resolves a plugin asset path to the corresponding public path.
	 *
	 * For example: "plugin/Foo/assets/js/app.js" → "/assets/Foo/js/app.js"
	 *
	 * @param string $path Internal plugin-relative asset path
	 * @return string Publicly accessible asset path (usually web-relative URL)
	 */
	public function resolve(string $path): string;

}

