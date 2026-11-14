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

namespace Base3\CoreFoundation\Xrm;

class XrmEntryLog {

	public $action;		// created | changed
	public $user;		// user id
	public $timestamp;	// timestamp Y-m-d H:i:s

	public static function unserialize($data) {

		// wenn $data schon ein XrmEntryLog ist, dann direkt zurückgeben
		if (is_object($data) && is_a($data, \Base3\CoreFoundation\Xrm\XrmEntryLog::class)) return $data;

		if (is_string($data)) $data = json_decode($data, true);
		if (is_object($data)) $data = (array) $data;

		$xrmentry = new self();
		if (isset($data["action"])) $xrmentry->action = $data["action"];
		if (isset($data["user"])) $xrmentry->user = $data["user"];
		if (isset($data["timestamp"])) $xrmentry->timestamp = $data["timestamp"];

		return $xrmentry;
	}

}
