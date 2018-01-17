<?php
namespace Dvi\Adianti;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Modules
{
    public static function getModules()
    {
        return [
            'adianti/modules'=> ['admin', 'available', 'common', 'log'],
            'davimenezes/adianti_erp_modules/src'=> ['contact'],
            'davimenezes/adianti_erp_modules/src/office' => ['project', 'tag', 'task', 'url', 'workspace']
        ];
    }
    
    public static function getFiles()
    {
        $modules = self::getModules();

        $files = array();
        foreach ($modules as $project => $module) {
            foreach ($module as $module_folder) {
                $directory = 'vendor/' . $project . '/' . $module_folder . '/control';
                if (is_dir($directory)) {
                    $recursiveDirectoryIterator = new RecursiveDirectoryIterator($directory);
                    $recursiveIteratorIterator = new RecursiveIteratorIterator(
                        $recursiveDirectoryIterator,
                        RecursiveIteratorIterator::CHILD_FIRST
                    );
                    $files[] = $recursiveIteratorIterator;
                }
            }
        }

        return $files;
    }
}
