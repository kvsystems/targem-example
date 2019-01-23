<?php
namespace Targem\Parser;

/**
 * Class CsvParser.
 * Parses csv file with headers.
 * @package Targem\Parser
 */
class CsvParser {

    /**
     * File being processed.
     * @var $_file bool|resource
     */
    private $_file;

    /**
     * Headers parse switch.
     * @var $_parseHeaders bool
     */
    private $_parseHeaders;

    /**
     * Headers array.
     * @var $_headers array
     */
    private $_headers = [];

    /**
     * Data array.
     * @var $_content array
     */
    private $_content = [];

    /**
     * CsvParser constructor.
     * Opens and parses csv file.
     * @param string $file
     * @param bool $headers
     */
    public function __construct(string $file, bool $headers = true)    {
        $this->_file = fopen($file, "r");
        $this->_parseHeaders = $headers;
        $this->_parse();
    }

    /**
     * CsvParser destructor.
     * Closes an open csv file.
     */
    public function __destruct()   {
        if($this->_file) fclose($this->_file);
    }

    /**
     * Returns csv headers.
     * @return array
     */
    public function headers()   {
        return $this->_headers;
    }

    /**
     * Returns csv data.
     * @return array
     */
    public function content()  {
        return $this->_content;
    }

    /**
     * Parses csv file from resource.
     */
    private function _parse()    {
        $i = 0;
        while ( ($data = fgetcsv($this->_file) ) !== false ) {
            $data = str_getcsv($data[0], PHP_EOL);

            foreach ($data as $row) {
                $row = array_filter(
                    array_map('trim', str_getcsv($row, ";"))
                );
                $this->_parseHeaders && $i == 0
                    ? $this->_headers = $row
                    : $this->_content[] = $row;
            }
            $i++;
        }
    }

}