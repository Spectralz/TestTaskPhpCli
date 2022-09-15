<?php

namespace Core;

class ASCII
{
    /**
     * @var array $data
     */
    protected $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Generate table
     *
     * @return string
     */
    public function getTable() : string
    {
        $this->prepareData();

        return $this->makeTable();
    }

    /**
     * Get keys from arrays
     *
     * @return array
     */
    public function getDataHeaders() : array
    {
        $keys = [];
        foreach ($this->data as $item) {
            foreach ($item as $key => $value) {
                $keys[] = $key;
            }
        }
        $keys = array_unique($keys);
        return $this->sortHeadersByAlphabetic($keys);
    }

    /**
     * @param array $headers
     * @return array
     */
    public function sortHeadersByAlphabetic(array $headers) : array
    {
        asort($headers);
        return $headers;
    }

    /**
     * Define max width for column
     *
     * @param array $column
     * @return int
     */
    public function getMaxWidthForColumn(array $column) : int
    {
        $maxWidth = 0;
        foreach ($column as $value) {
            if($maxWidth < strlen($value)) {
                $maxWidth = strlen($value);
            }
        }
        return $maxWidth;
    }

    /**
     * Prepare data before making table
     *
     * @return void
     */
    public function prepareData() : void
    {
        $headers = $this->getDataHeaders();

        $cols = [];
        foreach ($headers as $key => $header) {
            $cols[$key][] = $header;

            foreach ($this->data as $item) {
                $cols[$key][] = (isset($item[$header])) ? $item[$header] : '';
            }
        }

        $this->data = $cols;
    }

    /**
     * Make table from array
     *
     * @return string
     */
    protected function makeTable() : string
    {
        $table = '';
        if(count($this->data) > 0) {

            $i = 0;

            foreach ($this->data as $col) {
                foreach ($col as $value) {
                    $rows[$i][] = str_pad($value, $this->getMaxWidthForColumn($col), ' ', STR_PAD_LEFT);
                }
                $i++;
            }

            for($row = 0; $row < count($rows[0]); $row++) {
                $tableRow = "| ";
                for($col = 0; $col < count($rows); $col++) {
                    $tableRow .= " " . $rows[$col][$row] . " |";
                }
                $tableRows[] = $tableRow;
            }

            for($row = 0; $row < count($tableRows); $row++) {
                $rowLength = strlen($tableRows[$row]);
                if ($row === 0) {
                    $table .= str_repeat('=', $rowLength) . "\n";
                }

                $table .= $tableRows[$row] . "\n";

                if ($row === 0) {
                    $table .= str_repeat('-', $rowLength) . "\n";
                }

                if ($row === count($rows[0])-1) {
                    $table .= str_repeat('=', $rowLength) . "\n";
                }
            }
        }

        return $table;
    }

}