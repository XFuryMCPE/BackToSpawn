<?php

namespace BackToSpawn;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
class SpawnPort extends PluginBase{

    public function onEnable(){
    }
    public function onDisable(){
    }
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "spawnport"){
            if(!($sender instanceof Player)){
                $sender->sendMessage(TextFormat::AQUA."Please run this command in game");
                return true;
            }
            $worldspawn = $sender->getLevel()->getSpawnLocation();
            $sender->teleport($worldspawn);
            $sender->sendMessage(TextFormat::AQUA."Teleported to WorldSpawn");
        }
        return true;
    }
}
