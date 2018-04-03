<?php

namespace Nadya\ComposerPlugin;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Script\ScriptEvents;
use Composer\EventDispatcher\Event;
use Composer\Installer\PackageEvents;

class Plugin implements PluginInterface, EventSubscriberInterface
{
    protected $io;

    public function activate(Composer $composer, IOInterface $io)
    {
        $this->io = $io;
    }

    public static function getSubscribedEvents()
    {
        return array(
            ScriptEvents::POST_UPDATE_CMD => array(
                array('test', 0),
            ),
            ScriptEvents::POST_INSTALL_CMD => array(
                array('test', 0),
            ),
            PackageEvents::POST_PACKAGE_UPDATE => array(
                array('test', 0),
            )
        );
    }

    public function test(Event $event)
    {
        echo 'ho-hI-HA';
        file_put_contents('test.txt', 'some data');
        echo 'UUUAA';
    }
}
