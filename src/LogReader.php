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

    /** @var IDecorator */
    private IDecorator $decorator;


    /**
     * LogReader constructor.
     * @param string $logFilename
     * @param IOutput $iOutput
     * @param IDecorator $decorator
     */
    public function __construct(
        string $logFilename,
        IOutput $iOutput,
        IDecorator $decorator
    )
    {
        $this->logFilename = $logFilename;
        $this->iOutput = $iOutput;
        $this->decorator = $decorator;
    }


    /**
     * Read log file
     * @throws FileException
     */
    public function read()
    {

        if (!file_exists($this->logFilename))
        {
            throw new FileException('File not Found');
        }

        $handle = fopen($this->logFilename, "r");

        if ($handle === FALSE)
        {
            throw new FileException('File not opened');
        }

        $logGroupList = new \LogGroupList();

        while (($line = fgets($handle)) !== false)
        {
            $text = $this->decorator->make($line);
            $logGroupList->add($text);
        }

        fclose($handle);

        foreach ($logGroupList as $log)
        {
            $this->iOutput->write($log);
        }
    }
}