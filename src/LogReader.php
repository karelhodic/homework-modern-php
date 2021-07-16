<?php declare(strict_types=1);

/**
 * Class LogReader
 */
class LogReader
{
    /** @var string */
    private string $logFilename;

    /** @var IOutput */
    private IOutput $iOutput;

    /**
     * LogReader constructor.
     * @param string $logFilename
     * @param IOutput $iOutput
     */
    public function __construct(
        string $logFilename,
        IOutput $iOutput
    )
    {
        $this->logFilename = $logFilename;
        $this->iOutput = $iOutput;
    }


    /**
     * Read log file
     * @throws FileException
     */
    public function read()
    {

        if (file_exists($this->logFilename))
        {
            throw new FileException('File not Found');
        }

        $handle = fopen($this->logFilename, "r");

        var_dump($handle);

        if ($handle === FALSE)
        {
            // @todo throw
        }

        $logGroupList = new \LogGroupList();

        while (($line = fgets($handle)) !== false)
        {
            $logGroupList->add($line);
        }

        fclose($handle);

        foreach ($logGroupList as $log)
        {
            $this->iOutput->write($log);
        }
    }
}