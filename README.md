# aklump/gitignore

A small library to allow you to work with [.gitignore (glob) patterns](https://git-scm.com/docs/gitignore#_pattern_format).

## Test a .gitignore pattern

```php
$pattern = new \AKlump\GitIgnore\Pattern('foo/**/*.php');
$pattern->matches('foo/bar/baz/lorem.php') === TRUE;
```

## Convert to RegEx

```php
// Static method pattern
$regex = \AKlump\GitIgnore\PatternToRegex::convert('foo/**/*.php');
$regex === '#^foo/.+/[^/]*\.php/?$#';

// Invocable class pattern
$regex = (new \AKlump\GitIgnore\PatternToRegex())('foo/**/*.php');
$regex === '#^foo/.+/[^/]*\.php/?$#';
```

## Check If String Contains a Pattern

```php
\AKlump\GitIgnore\Analyzer::containsPattern('foo/**') === TRUE
\AKlump\GitIgnore\Analyzer::containsPattern('foo/bar') === FALSE
```

## Known Issues

Not all [special characters](https://pavolkutaj.medium.com/ignore-files-in-gitignore-using-globbing-patterns-4558699bdbf9) are supported and may never be.
