# Kirby Sanitize Filenames

This plugin provides filename manipulation using file hooks for Kirby CMS.

## Features
- Converts filenames to different case styles (PascalCase, camelCase, snake_case, kebab-case).
- Sanitizes file names.
- Option to add a prefix to every file.

## Installation

### Download

Download and copy this repository to `/site/plugins/kirby-sanitize-filenames`.

### Composer

```
composer require timnarr/kirby-sanitize-filenames
```

## Usage
The plugin listens for these two Kirby hooks, and when these are triggered, the filename gets manipulated:
- `file.create:after`
- `file.replace:after`

This plugin does not support the `changeName` hook because file renaming, which occurs after the `create` and `replace` hooks, will trigger the `changeName` hook too. This could lead to some misbehaviors. However, it is beneficial to be able to change the filename after the initial upload and filename manipulation.

## Config
You can choose between different case styles: `pascal`, `camel`, `snake` and `kebab` (which is also the default style). The prefix will not be transformed in any way, except for appending a delimiter: `_` for snake and `-` for kebab style.


```php
'timnarr.sanitize-filenames' => [
  'caseStyle' => 'snake',
  'prefix' => 'timnarr'
]
```

## License
[MIT License](./LICENSE) Copyright © 2023 Tim Narr
