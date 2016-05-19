<?php

namespace BackToSpawn;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info("[BackToSpawn] enabled")
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "spawn"){
            if(!$sender instanceof Player){
                $sender->sendMessage("Please run this command in-game");
                return;
            }
            if(count($args) > 1 or count($args) < 1){
                $sender->sendMessage(TextFormat::RED."Usage: /spawn <default:here>");
                return;
            }
            switch(strtolower($args[0])){
                case "default":
                    $sender->teleport($this->getServer()->getDefaultLevel()->getSpawnLocation());
                    $sender->sendMessage(TextFormat::GREEN."Teleported to the server's default spawn!");
                break;
                case "here":
                    $sender->teleport($sender->getLevel()->getSpawnLocation());
                    $sender->sendMessage(TextFormat::GREEN."Teleported to this world's spawn!");
                break;
                default:
                   $sender->sendMessage(TextFormat::RED."Usage: /spawn <default:here>");
                break;
            }
        }
    }
}
