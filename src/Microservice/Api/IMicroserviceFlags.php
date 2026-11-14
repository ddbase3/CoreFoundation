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

namespace Base3\CoreFoundation\Microservice\Api;

/**
 * Interface IMicroserviceFlags
 *
 * Defines constants used to modify microservice behavior.
 */
interface IMicroserviceFlags {

	/**
	 * Indicates the microservice is for internal use only.
	 */
	const INTERNALONLY = 1;

	/**
	 * Indicates the response is a raw binary stream (e.g. file download).
	 */
	const BINARYSTREAM = 2;

	/**
	 * Indicates that input and output are serialized (e.g. PHP serialization).
	 */
	const SERIALIZED = 4;

}

