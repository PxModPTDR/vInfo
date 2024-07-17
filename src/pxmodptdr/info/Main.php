<?php

namespace pxmodptdr\info;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;
use pxmodptdr\info\command\info;

class Main extends PluginBase{


    use SingletonTrait;
    protected function onLoad(): void
    {
        self::setInstance($this);
    }

    protected function onEnable(): void
    {
        $this->saveDefaultConfig();
        $this->getLogger()->info("§2Activation du plugin info by Vanilla Shop !");
        $this->getServer()->getCommandMap()->register("",new info());
    }
 }