<?php

@include_once __DIR__ . '/vendor/autoload.php';

use Kirby\Cms\App;
use timnarr\Sanitize;

App::plugin('timnarr/sanitize-filenames', [
	'options' => [
		'caseStyle' => 'kebab',
		'prefix' => ''
	],
	'hooks' => [
		'file.create:after' => fn ($file) => Sanitize::sanitizeFileName($file),
		'file.replace:after' => fn ($newFile, $oldFile) => Sanitize::sanitizeFileName($newFile)
	]
]);
