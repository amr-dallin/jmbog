<?php
namespace ControlPanel\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Files helper
 */
class FilesHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function fileSizeConvert($bytes)
    {
        $bytes = floatval($bytes);
        $items = [
            ['unit' => __('Tb'), 'value' => pow(1024, 4)],
            ['unit' => __('Gb'), 'value' => pow(1024, 3)],
            ['unit' => __('Mb'), 'value' => pow(1024, 2)],
            ['unit' => __('Kb'), 'value' => 1024],
            ['unit' => __('b'), 'value' => 1]
        ];

        foreach($items as $item) {
            if($bytes >= $item['value']) {
                $result = $bytes / $item['value'];
                $result = str_replace('.', ',' , strval(round($result, 2))) . ' ' . $item['unit'];
                break;
            }
        }

        return $result;
    }
}
