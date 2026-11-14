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

/**
 * Interface IPageModuleFooter
 *
 * Represents a page module that appears in the footer area and defines a display priority.
 */
interface IPageModuleFooter extends IPageModule {

	/**
	 * Returns the display priority of the module.
	 *
	 * Lower values may appear earlier depending on layout logic.
	 *
	 * @return int Module priority
	 */
	public function getPriority();

}

