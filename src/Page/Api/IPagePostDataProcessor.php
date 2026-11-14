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
 * Interface IPagePostDataProcessor
 *
 * Extends a page to support processing POST data and forwarding after submission.
 */
interface IPagePostDataProcessor extends IPage {

	/**
	 * Processes incoming POST data.
	 *
	 * Should be called when the page receives a POST request.
	 *
	 * @return void
	 */
	public function processPostData();

	/**
	 * Returns the URL to forward to after successful processing.
	 *
	 * @return string|null Forward target URL or null if no redirect is needed
	 */
	public function getForwardUrl();

}

