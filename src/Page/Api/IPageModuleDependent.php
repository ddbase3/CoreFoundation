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

namespace Base3\CoreFoundation\Page\Api;

use Base3\CoreFoundation\Api\IBase;

/**
 * Interface IPageModuleDependent
 *
 * Represents a page module that declares dependencies on other modules.
 */
interface IPageModuleDependent extends IPageModule {

	/**
	 * Returns a list of required module names or identifiers.
	 *
	 * @return array<string> List of required module identifiers
	 */
	public function getRequiredModules();

}

