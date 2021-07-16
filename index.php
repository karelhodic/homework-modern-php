<?php declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/IOutput.php';
require_once __DIR__ . '/src/ConsoleWriter.php';
require_once __DIR__ . '/src/LogReader.php';
require_once __DIR__ . '/src/LogGroupList.php';

$consoleWriter = new \ConsoleWriter();
$logFilename = $argv[1] ?? NULL;

if ($logFilename === NULL)
{
    echo "First parameter not found";
    exit();
}

$logReader = new \LogReader($logFilename, $consoleWriter);

$logReader->read();