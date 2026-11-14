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

namespace Base3\CoreFoundation\Translation\Api;

/**
 * Interface ITranslation
 *
 * Provides key based translation for BASE3 components.
 */
interface ITranslation {

	/**
	 * Translates a key from a named language set and section.
	 *
	 * @param string $set Translation set name, usually matching lang/<set>/<language>.ini
	 * @param string $section Section inside the INI file
	 * @param string $key Translation key inside the section
	 * @param string $fallback Fallback text if no translation is available
	 * @param array<string, scalar|null> $replacements Optional placeholder replacements
	 * @return string Translated text or fallback
	 */
	public function translate(string $set, string $section, string $key, string $fallback = '', array $replacements = []): string;

}
