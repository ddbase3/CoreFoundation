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

namespace Base3\CoreFoundation\Diagnostics\Base;

use Base3\CoreFoundation\Api\IModuleRegistry;
use Base3\CoreFoundation\Diagnostics\Api\IDiagnosticCheck;
use Base3\CoreFoundation\Diagnostics\Dto\DiagnosticCheckResult;
use Base3\CoreFoundation\Diagnostics\Inspection\ModuleSourceInventory;
use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Throwable;

/** Shared read-only inspection and safe result formatting for source diagnostics. */
abstract class AbstractSourceDiagnosticCheck implements IDiagnosticCheck {

	public function __construct(
		private readonly IModuleRegistry $modules,
		private readonly ?string $frameworkRoot = null,
		private readonly ?string $pluginsRoot = null
	) {}

	protected function inventory(): ModuleSourceInventory {
		return new ModuleSourceInventory($this->modules, $this->frameworkRoot, $this->pluginsRoot);
	}


	/**
	 * @param list<string> $failures
	 * @param list<string> $warnings
	 * @return list<string>
	 */
	protected function phpFiles(string $root, array &$failures, array &$warnings): array {
		$files = [];
		$excluded = [];
		try {
			$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS));
			foreach($iterator as $entry) {
				$path = $entry->getPathname();
				$relative = ltrim(substr($path, strlen(rtrim($root, '/\\'))), '/\\');
				$parts = explode('/', str_replace('\\', '/', $relative));
				if(array_intersect($parts, ['.git', 'vendor', 'node_modules'])) {
					if(strtolower($entry->getExtension()) === 'php') $excluded[] = $relative;
					continue;
				}
				if(strtolower($entry->getExtension()) !== 'php') continue;
				if($entry->isLink() || !$entry->isFile() || !$entry->isReadable()) {
					$failures[] = basename($root) . '/' . $relative . ': unreadable or symlinked PHP file';
					continue;
				}
				$files[] = $path;
			}
		} catch(Throwable $exception) {
			$failures[] = basename($root) . ': cannot enumerate all PHP files';
		}
		if($excluded) $warnings[] = basename($root) . ': ' . count($excluded) . ' third-party PHP files excluded from BASE3 namespace validation';
		sort($files, SORT_STRING);
		return $files;
	}

	/**
	 * @param list<string> $failures
	 * @param list<string> $warnings
	 */
	protected function report(array $failures, array $warnings, int $inspected): DiagnosticCheckResult {
		$status = $failures ? DiagnosticCheckResult::FAILED : ($warnings ? DiagnosticCheckResult::WARNING : DiagnosticCheckResult::PASSED);
		$notes = array_merge($failures, $warnings);
		$examples = [];
		foreach(array_slice($notes, 0, 3) as $note) {
			$note = (string)preg_replace('/[<>&"\x00-\x1F\x7F]/u', '?', $note);
			$examples[] = strlen($note) > 150 ? substr($note, 0, 147) . '...' : $note;
		}
		$sample = implode('; ', $examples);
		if(count($notes) > 3) {
			$sample .= '; ... (+' . (count($notes) - 3) . ')';
		}
		return new DiagnosticCheckResult(
			$status,
			$status,
			['inspected' => $inspected, 'failed' => count($failures), 'warning' => count($warnings), 'sample' => $sample],
			$status === DiagnosticCheckResult::PASSED ? '' : 'remediation',
			['inspected' => $inspected, 'failed' => count($failures), 'warning' => count($warnings)]
		);
	}

}
