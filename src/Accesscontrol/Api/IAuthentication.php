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

namespace Base3\CoreFoundation\Accesscontrol\Api;

use Base3\CoreFoundation\Api\IBase;

/**
 * Interface IAuthentication
 *
 * Defines methods for user authentication, session lifecycle, and verbosity control.
 */
interface IAuthentication extends IBase {

	/**
	 * Enables or disables verbose mode (e.g. for logging or debug output).
	 *
	 * @param bool $verbose True to enable verbose mode, false to disable
	 * @return void
	 */
	public function setVerbose($verbose);

	/**
	 * Authenticates a user using the current request or explicit credentials.
	 *
	 * Without an argument, implementations MUST retain their existing request,
	 * session or transport-based authentication behavior. With credentials,
	 * an implementation MUST authenticate only those supplied values or return
	 * null when explicit credentials are unsupported. It MUST NOT substitute
	 * request, session, impersonation or service identities for the supplied user.
	 * This method does not establish a session in a different application.
	 *
	 * @param array<string, mixed>|null $credentials Explicit username/password fields or null for existing request behavior.
	 * @return mixed The verified host authentication key understood by the active
	 * usermanager, null when no identity is established, or an existing provider-specific
	 * denial result. This MUST NOT be a different identifier merely because both
	 * identifiers are called user IDs. In Base3SystemUsermanager deployments the
	 * key is the exact User::$userid login, NOT native User::$id; KeyHarbor user
	 * credentials hold the latter and need a verified native lookup to obtain the former.
	 * @throws \Throwable On implementation-specific infrastructure failures; callers must not treat these as invalid credentials.
	 */
	public function login(?array $credentials = null);

	/**
	 * Keeps the current session active for the given user ID.
	 *
	 * Useful for session continuation or single sign-on scenarios.
	 *
	 * @param mixed $userid User ID
	 * @return void
	 */
	public function keep($userid);

	/**
	 * Finalizes the login session for the given user ID.
	 *
	 * @param mixed $userid User ID
	 * @return void
	 */
	public function finish($userid);

	/**
	 * Logs the current user out and clears authentication data.
	 *
	 * @return void
	 */
	public function logout();

}

