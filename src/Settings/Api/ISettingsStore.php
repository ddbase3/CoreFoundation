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

namespace Base3\CoreFoundation\Settings\Api;

/**
 * Interface ISettingsStore
 *
 * Stores grouped, named settings datasets.
 *
 * A dataset is always addressed by:
 * - group
 * - name
 *
 * Example:
 * - group: "providers"
 * - name: "openai"
 * - settings: [ "endpoint" => "...", "api_key" => "..." ]
 */
interface ISettingsStore {

	/**
	 * Returns one settings dataset.
	 *
	 * If the dataset does not exist, $default is returned.
	 *
	 * @param string $group
	 * @param string $name
	 * @param array $default
	 * @return array
	 */
	public function get(string $group, string $name, array $default = []): array;

	/**
	 * Replaces one settings dataset completely.
	 *
	 * @param string $group
	 * @param string $name
	 * @param array $settings
	 * @return void
	 */
	public function set(string $group, string $name, array $settings): void;

	/**
	 * Checks whether a settings dataset exists.
	 *
	 * @param string $group
	 * @param string $name
	 * @return bool
	 */
	public function has(string $group, string $name): bool;

	/**
	 * Removes one settings dataset.
	 *
	 * @param string $group
	 * @param string $name
	 * @return void
	 */
	public function remove(string $group, string $name): void;

	/**
	 * Returns all settings datasets of one group.
	 *
	 * The returned array is keyed by dataset name.
	 *
	 * Example:
	 * [
	 *     'openai' => [ 'label' => 'OpenAI', ... ],
	 *     'mistral' => [ 'label' => 'Mistral', ... ]
	 * ]
	 *
	 * If the group does not exist, an empty array is returned.
	 *
	 * @param string $group
	 * @return array
	 */
	public function getGroup(string $group): array;

	/**
	 * Saves the current state.
	 *
	 * @return void
	 */
	public function save(): void;

	/**
	 * Reloads the underlying storage.
	 *
	 * @return void
	 */
	public function reload(): void;
}
