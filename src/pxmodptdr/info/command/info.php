<?php

namespace pxmodptdr\info\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\Tool;
use pocketmine\permission\DefaultPermissions;
use pocketmine\player\Player;
use pxmodptdr\info\Main;

class info extends Command
{
public function __construct() {
    
    parent::__construct("info", "Vous donne des informations sur un item/bloc", "/info");
    $this->setPermission(DefaultPermissions::ROOT_USER);
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player) return;
        $item = $sender->getInventory()->getItemInHand();
        $message = Main::getInstance()->getConfig()->get("message");
        $message = str_replace("{name}", $item->getVanillaName(), $message);
        $message = str_replace("{id}", $item->getTypeId(), $message);
        $message = str_replace("{count}", $count = $item->getCount(), $message);
        $message = str_replace("{fueltime}", $item->getFuelTime(), $message);
        if($item instanceof Tool){
            $message = str_replace("{damage}", $item->getDamage(), $message);  
        }
        $sender->sendMessage($message);
      } 
    }
