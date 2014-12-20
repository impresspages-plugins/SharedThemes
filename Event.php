<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 14.12.20
 * Time: 18.35
 */

namespace Plugin\SharedThemes;


class Event
{
    public static function ipBeforeThemeInstalled($themeName)
    {
        Model::installThemeIfNeeded($themeName);
    }
}
