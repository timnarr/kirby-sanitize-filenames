# Kirby Sanitize Filenames
**Sanitize Filenames for Kirby CMS** – This plugin automatically transforms and sanitizes filenames using file hooks. It can converts filenames to `snake_case` or `kebab-case`. It also sanitizes filenames by modifying special characters and allows adding a custom prefix for consistent file naming.

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
You can choose between `snake` and `kebab` style. The prefix will also be transformed to a [safe-name](https://github.com/getkirby/kirby/tree/3.9.8/src/Filesystem/F.php#L741) and a delimiter gets appended: `_` for snake and `-` for kebab style.

```php
'timnarr.sanitize-filenames' => [
  'caseStyle' => 'snake',
  'prefix' => 'timnarr'
]
```

## License
[MIT License](./LICENSE) Copyright © 2023 Tim Narr
