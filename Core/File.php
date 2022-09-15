<?php

namespace Core;

class File
{
    /**
     * Path to file storage
     */
    private const PATH = 'Storage';

    /**
     * Get array from file
     *
     * @param $file
     * @return array
     */
    public function getArrayFromFile(string $file, string $folder = '') : array
    {
        if($folder != '') {
            $folder = '/' . trim('/', $folder) . '/';
        }

        $filePath = ROOT . '/' . self::PATH . '/' .$folder . $file;
        if(!is_file($filePath)) {
            return [];
        }

        $array = include($filePath);

        if(!is_array($array)) {
            return [];
        }

        return $array;
    }
}