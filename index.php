<?php declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/IOutput.php';
require_once __DIR__ . '/src/ConsoleWriter.php';
require_once __DIR__ . '/src/LogReader.php';
require_once __DIR__ . '/src/LogGroupList.php';
require_once __DIR__ . '/src/FileException.php';
require_once __DIR__ . '/src/IDecorator.php';
require_once __DIR__ . '/src/Decorator.php';
require_once __DIR__ . '/src/IFilter.php';
require_once __DIR__ . '/src/Filter.php';

$logFilename = $argv[1] ?? NULL;

if ($logFilename === NULL)
{
    echo "First parameter not found";
    exit();
}

$consoleWriter = new \ConsoleWriter();
$decorator = new \Decorator('/test\.(\w+)/');
$filter = new \Filter();

// add filter
$filter->addFilter('debug');

$logReader = new \LogReader(
    $logFilename,
    $consoleWriter,
    $decorator,
    $filter
);

try
{
    $logReader->read();
}
catch (\FileException $ex)
{
    echo "{$ex->getMessage()}\n";
}
