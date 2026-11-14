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

namespace Base3\CoreFoundation\Worker\Api;

use Base3\CoreFoundation\Api\IBase;

/**
 * Interface IJob
 *
 * Represents a background or scheduled job that can be executed by a worker.
 */
interface IJob extends IBase {

	/**
	 * Determines whether the job is currently active and should be considered for execution.
	 *
	 * @return bool True if active, false otherwise
	 */
	public function isActive();

	/**
	 * Returns the job's execution priority (0–100).
	 *
	 * Higher values indicate higher priority.
	 *
	 * @return int Priority value
	 */
	public function getPriority();

	/**
	 * Executes the job logic.
	 *
	 * @return mixed Result of the job execution (may vary by implementation)
	 */
	public function go();

}

