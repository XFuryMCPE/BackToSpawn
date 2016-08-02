<?php

namespace BackToSpawn;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class BackToSpawn extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info("[BackToSpawn] enabled");
    }
    
    public function onDisable(){
        $this->getLogger()->info("[BackToSpawn] enabled");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if($command->getName() === "spawn"){
            if(!($sender instanceof Player)){
                $sender->sendMessage(TextFormat::RED."Please run this command in game");
                return true;
            }
            
            $worldspawn = $sender->getLevel()->getSpawnLocation();
            $sender->teleport($worldspawn);
            $sender->sendMessage(TextFormat::GREEN."Teleported to Spawn");
        }
        return true;
    }
}
