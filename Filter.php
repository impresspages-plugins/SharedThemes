<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 14.12.20
 * Time: 15.40
 */

namespace Plugin\SharedThemes;


class Filter
{

    public static function ipThemes($themes)
    {
        $repositoryThemes = Model::repositoryThemes();
        $themes = array_merge($repositoryThemes, $themes);
        return $themes;
    }
}
