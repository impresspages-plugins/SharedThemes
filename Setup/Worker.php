<?php
/**
 * @package   ImpressPages
 */




namespace Plugin\SharedThemes\Setup;


class Worker
{
    public function activate()
    {
        if (version_compare(\Ip\Application::getVersion(), '4.4.2', '<')) {
            throw new \Ip\Exception('ImpressPages 4.4.2 or later required');
        }
    }
}
