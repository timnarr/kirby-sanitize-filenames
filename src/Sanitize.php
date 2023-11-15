<?php

namespace timnarr;

class Sanitize
{
	/**
	 * Adds a specified delimiter to a string, replacing non-alphanumeric characters.
	 */
	private static function addDelimiter(string $string, string $delimiter): string
	{
		// Lowercase all characters
		$string = strtolower($string);
		// Replace non-alphanumeric characters with the delimiter
		$string = preg_replace('/[^A-Za-z0-9]+/', $delimiter, $string);
		// Remove leading and trailing delimiters
		$string = trim($string, $delimiter);

		return $string;
	}

	/**
	 * Converts a string to snake_case.
	 */
	public static function toSnakeCase(string $string): string
	{
		return self::addDelimiter($string, '_');
	}

	/**
	 * Converts a string to kebab-case.
	 */
	public static function toKebabCase(string $string): string
	{
		return self::addDelimiter($string, '-');
	}

	/**
	 * Sanitizes a filename by applying case styling and optionally adding a prefix.
	 */
	public static function sanitizeFileName($file)
	{
		$fileName = $file->name();
		$caseStyle = option('timnarr.sanitize-filenames.caseStyle');
		$prefix = trim(option('timnarr.sanitize-filenames.prefix'));

		if (!empty($prefix) && strpos($fileName, $prefix) === 0) {
			$prefix = '';
		}

		switch ($caseStyle) {
			case 'snake':
				$fileName = self::toSnakeCase($fileName);
				if (!empty($prefix)) {
					$fileName = $prefix . '_' . $fileName;
				}
				break;
			case 'kebab':
			default:
				$fileName = self::toKebabCase($fileName);
				if (!empty($prefix)) {
					$fileName = $prefix . '-' . $fileName;
				}
				break;
		}

		$newfile = $file->changeName($fileName);

		return $newfile;

	}
}
