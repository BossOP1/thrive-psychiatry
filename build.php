<?php
/**
 * Static build for Netlify.
 *
 * Netlify serves static files only, so this renders every top-level PHP page
 * (except this script) to HTML in dist/ and copies assets/ alongside.
 *   index.php          -> dist/index.html
 *   telepsychiatry.php -> dist/telepsychiatry.html  (served at /telepsychiatry)
 *
 * Run locally with: php build.php
 */

$root = __DIR__;
$dist = $root . '/dist';

function remove_dir(string $dir): void
{
    if (!is_dir($dir)) {
        return;
    }
    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($items as $item) {
        $item->isDir() ? rmdir($item->getPathname()) : unlink($item->getPathname());
    }
    rmdir($dir);
}

function copy_dir(string $from, string $to): int
{
    $count = 0;
    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($from, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    foreach ($items as $item) {
        $target = $to . '/' . substr($item->getPathname(), strlen($from) + 1);
        if ($item->isDir()) {
            @mkdir($target, 0755, true);
        } elseif ($item->getFilename() !== '.DS_Store') {
            @mkdir(dirname($target), 0755, true);
            copy($item->getPathname(), $target);
            $count++;
        }
    }
    return $count;
}

// Render a page in its own scope so variables don't leak between pages.
function render_page(string $file): string
{
    ob_start();
    try {
        (static function () use ($file) {
            include $file;
        })();
    } catch (Throwable $e) {
        ob_end_clean();
        throw $e;
    }
    return ob_get_clean();
}

remove_dir($dist);
mkdir($dist, 0755, true);

$pages = array_filter(glob($root . '/*.php'), fn ($f) => basename($f) !== 'build.php');
if (!$pages) {
    fwrite(STDERR, "No pages found.\n");
    exit(1);
}

foreach ($pages as $page) {
    $name = basename($page, '.php');
    try {
        $html = render_page($page);
    } catch (Throwable $e) {
        fwrite(STDERR, "Failed to render {$name}.php: {$e->getMessage()}\n");
        exit(1);
    }
    file_put_contents("{$dist}/{$name}.html", $html);
    printf("Built %s.html (%s KB)\n", $name, number_format(strlen($html) / 1024, 1));
}

if (is_dir($root . '/assets')) {
    printf("Copied %d asset files\n", copy_dir($root . '/assets', $dist . '/assets'));
}

echo "Done -> dist/\n";
