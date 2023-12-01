<?php
declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    $rectorConfig->importNames(true, true);
    $rectorConfig->importShortClasses(false);

    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_83,
        PHPUnitSetList::PHPUNIT_100
    ]);
};
