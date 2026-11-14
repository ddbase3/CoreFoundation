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

namespace Base3\CoreFoundation\Accesscontrol;

use Base3\CoreFoundation\Accesscontrol\Api\IAuthentication;

abstract class AbstractAuth implements IAuthentication {

	protected $verbose;

	// Implementation of IAuthentication

	public function setVerbose($verbose) {
		$this->verbose = $verbose;
	}

	public function login(?array $credentials = null) {}

	public function keep($userid) {}

	public function finish($userid) {}

	public function logout() {}

}
