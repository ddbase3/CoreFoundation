<?php

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

namespace Base3\CoreFoundation\Api;

/**
 * Interface IConversation
 *
 * Defines a multimodal conversation interface for AI models, including support for raw responses,
 * runtime configuration, tool call extraction, and final response evaluation.
 */
interface IConversation {

	/**
	 * Starts a conversation with multimodal input.
	 *
	 * @param array $messages List of messages, each with:
	 * [
	 *   'role' => 'system' | 'user' | 'assistant' | 'function',
	 *   'content' => mixed (e.g. text, image, etc.),
	 * ]
	 * @param array $context Context and options (e.g. model, temperature, tools)
	 * @return string AI's textual response
	 */
	public function chat(array $messages, array $context = []): string;

	/**
	 * Returns the full raw response from the AI model.
	 *
	 * Includes tool calls, function executions, etc.
	 *
	 * @param array $messages Same format as in chat()
	 * @param array $context Optional context and configuration
	 * @return mixed Full raw AI response
	 */
	public function raw(array $messages, array $context = []);

	/**
	 * Returns the name or identifier of the AI model in use.
	 *
	 * @return string Model identifier (e.g. "gpt-4-turbo")
	 */
	public function getModel(): string;

	/**
	 * Configures the conversation engine at runtime.
	 *
	 * @param array $options Key-value options (e.g. temperature, system prompt, etc.)
	 * @return void
	 */
	public function configure(array $options): void;

	/**
	 * (Optional) Extracts a tool call instruction from a raw response.
	 *
	 * Useful for integrations (e.g. CRM API requests).
	 *
	 * @param mixed $response Raw response returned by raw()
	 * @return array|null Structured tool call request or null if none
	 */
	public function extractToolCall($response): ?array;

	/**
	 * (Optional) Determines whether the response is ready to be shown to the user.
	 *
	 * @param mixed $response Raw or structured response
	 * @return bool True if response is final and displayable
	 */
	public function isFinalResponse($response): bool;

}

