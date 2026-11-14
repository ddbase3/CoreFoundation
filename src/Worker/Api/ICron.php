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

/**
 * Interface ICron
 *
 * Represents a scheduled job with a cron-style time definition.
 * Inherits execution behavior from IJob.
 */
interface ICron extends IJob {

	/**
	 * Returns the cron time code defining when the job should run.
	 *
	 * Format: [minute, hour, dayOfMonth, month, dayOfWeek]
	 * Example: ["0", "4", "*", "*", "*"] → every day at 4:00 AM
	 *
	 * @return array<int, string> Cron time pattern components
	 */
	public function getTimeCode();

}

