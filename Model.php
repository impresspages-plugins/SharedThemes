<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 14.12.20
 * Time: 15.08
 */

namespace Plugin\SharedThemes;


class Model
{

    public static function repositoryThemes()
    {
        $dir = ipGetOption('SharedThemes.themesDir');
        $dir = self::addSlash($dir);
        $url = ipGetOption('SharedThemes.themesUrl');
        $url = self::addSlash($url);
        if (empty($dir)) {
            return array();
        }

        if (!is_dir($dir)) {
            return array();
        }
        $themes = array();
        if ($handle = opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if (is_dir($dir . $file) && $file != '..' && $file != '.' && substr(
                        $file,
                        0,
                        1
                    ) != '.'
                ) {
                    $themes[$file] = \Ip\Internal\Design\Service::instance()->getTheme($file, $dir, $url);
                }
            }
            closedir($handle);
        }

        return $themes;
    }

    protected static function addSlash($dir)
    {
        if (substr($dir, -1) != '/') {
            $dir .= '/';
        }
        return $dir;
    }



    public static function installThemeIfNeeded($info) {
        $themeName = $info['themeName'];
        $dir = ipGetOption('SharedThemes.themesDir');
        $dir = self::addSlash($dir);
        $repositoryThemes = self::repositoryThemes();
        if (!empty($repositoryThemes[$themeName]) && !is_dir(ipFile('Theme/' . $themeName))) {
            $fs = new FileSystem();
            $fs->createWritableDir(ipFile('Theme/' . $themeName));
            $fs->cpContent($dir . $themeName, ipFile('Theme/' . $themeName));
        }

    }

}
