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
use Base3\CoreFoundation\Api\ISchemaProvider;

/**
 * Interface IJobExecutionPolicy
 *
 * Defines whether a job may be executed in the current worker run.
 *
 * Policies are discoverable via IClassMap and configurable via setData().
 * The schema describes the expected data structure for UI, validation,
 * storage, and LLM-based configuration.
 */
interface IJobExecutionPolicy extends IBase, ISchemaProvider {

	/**
	 * Sets policy configuration data.
	 *
	 * @param array $data Policy configuration data
	 * @return void
	 */
	public function setData(array $data);

	/**
	 * Determines whether the job may run now.
	 *
	 * @param string $jobName Technical job name
	 * @return bool True if the job may run, false otherwise
	 */
	public function shouldRun(string $jobName);

	/**
	 * Marks the job as handled for this policy.
	 *
	 * The job itself decides when this method is called.
	 *
	 * @param string $jobName Technical job name
	 * @return void
	 */
	public function markRun(string $jobName);

	/**
	 * Returns the reason why the job may not run.
	 *
	 * @return string Skip reason
	 */
	public function getReason();

}
