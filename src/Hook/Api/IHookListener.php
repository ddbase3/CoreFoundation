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

namespace Base3\CoreFoundation\Hook\Api;

/**
 * Interface IHookListener
 *
 * Represents a listener that can subscribe to and handle named hooks.
 */
interface IHookListener {

	/**
	 * Determines whether the listener is currently active.
	 *
	 * Only active listeners are invoked.
	 *
	 * @return bool True if the listener is active, false otherwise
	 */
	public function isActive(): bool;

	/**
	 * Called when a hook is triggered.
	 *
	 * Signature can be adjusted to your specific needs.
	 *
	 * @param string $hookName Name of the triggered hook
	 * @param mixed ...$args Optional additional hook arguments
	 * @return mixed Result of hook handling
	 */
	public function handle(string $hookName, ...$args);

	/**
	 * Returns a list of hook names the listener subscribes to, with priorities.
	 *
	 * Example:
	 * [
	 *   'hook.name' => 10,
	 *   'another.hook' => 0,
	 * ]
	 *
	 * @return array<string, int> Associative array of hook names and their priority
	 */
	public static function getSubscribedHooks(): array;
}
