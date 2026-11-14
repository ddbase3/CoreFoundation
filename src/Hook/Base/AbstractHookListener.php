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

namespace Base3\CoreFoundation\Hook\Base;

use Base3\CoreFoundation\Hook\Api\IHookListener;

/**
 * Interface-complete, inactive default for hook listeners.
 *
 * An inheriting listener neither subscribes to hooks nor handles events
 * unless its concrete implementation explicitly overrides these methods.
 */
abstract class AbstractHookListener implements IHookListener {

	/** @inheritDoc */
	public function isActive(): bool {
		return false;
	}

	/** @inheritDoc */
	public function handle(string $hookName, ...$args) {
		return null;
	}

	/** @inheritDoc */
	public static function getSubscribedHooks(): array {
		return [];
	}
}
