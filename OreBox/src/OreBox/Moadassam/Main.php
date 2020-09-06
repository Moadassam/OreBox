<?php

namespace OreBox\Moadassam;

use pocketmine\block\Block;
use pocketmine\entity\Entity;
use pocketmine\entity\EntityIds;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\level\particle\LavaParticle;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\ActorEventPacket;
use pocketmine\network\mcpe\protocol\AddActorPacket;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{

    public $config;

    public function onEnable()
    {
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->config = $this->getConfig()->getAll();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info("§aOreBox §eBy Moadassam §aON");
    }
    public function onDisable()
    {
        $this->getLogger()->info("§4OreBox §eBy Moadassam §4OFF");
    }

    public function onBreak(BlockBreakEvent $event){
        $player = $event->getPlayer();
        //$blockid = $this->config["block"];
        $block = $event->getBlock();
        $blockposx = $event->getBlock()->getX();
        $blockposy = $event->getBlock()->getY();
        $blockposz = $event->getBlock()->getZ();
        $level = $player->getLevel();

        if ($event->getBlock()->getId() == 241){

            $light = new AddActorPacket();
            $light->type = AddActorPacket::LEGACY_ID_MAP_BC[EntityIds::LIGHTNING_BOLT];
            $light->entityRuntimeId = Entity::$entityCount++;
            $light->metadata = array();
            $light->yaw = $block->getY();
            $light->pitch = $block->getX();
            $light->position = $block;
            $viewers = $player->getViewers();
            $viewers[] = $player;
            $this->getServer()->broadcastPacket($viewers, $light);


            $name = "firework.launch";
            $sound = new PlaySoundPacket();
            $sound->soundName = $name;
            $sound->volume = 1.0;
            $sound->pitch = 1.0;
            $sound->x = $block->x;
            $sound->y = $block->y;
            $sound->z = $block->z;
            $player->dataPacket($sound);

            $random = mt_rand(1, 50);
            $random2 = mt_rand(1, 32);
            $random3 = mt_rand(32, 64);
            $random4 = mt_rand(1, 3);
            $random5 = mt_rand(1, 4);
            $playername = $player->getName();

            foreach($this->getServer()->getOnlinePlayers() as $player) {
                $level->addParticle(new LavaParticle(new Vector3($blockposx, $blockposy, $blockposz)));
                $level->addParticle(new LavaParticle(new Vector3($blockposx, $blockposy, $blockposz)));
                $level->addParticle(new LavaParticle(new Vector3($blockposx, $blockposy, $blockposz)));
                $level->addParticle(new LavaParticle(new Vector3($blockposx, $blockposy, $blockposz)));
            }


            if ($random == 1) {
                $event->setDrops([Item::get(265,0,$random3)]);
            }
            if ($random == 32) {
                $event->setDrops([Item::get(265,0,$random3)]);
            }
            if ($random == 35) {
                $event->setDrops([Item::get(265,0,$random3)]);
            }
            if ($random == 39) {
                $event->setDrops([Item::get(265,0,$random3)]);
            }
            if ($random == 41) {
                $event->setDrops([Item::get(265,0,$random3)]);
            }
            if ($random == 42) {
                $event->setDrops([Item::get(265,0,$random3)]);
            }
            if ($random == 43) {
                $event->setDrops([Item::get(265,0,$random3)]);
            }
            if ($random == 2) {
                $event->setDrops([Item::get(42, 0, $random2)]);
            }

            if ($random == 3){
                $event->setDrops([Item::get(264, 0, $random3)]);
            }
            if ($random == 33){
                $event->setDrops([Item::get(264, 0, $random3)]);
            }
            if ($random == 36){
                $event->setDrops([Item::get(264, 0, $random3)]);
            }
            if ($random == 44){
                $event->setDrops([Item::get(264, 0, $random3)]);
            }
            if ($random == 45){
                $event->setDrops([Item::get(264, 0, $random3)]);
            }
            if ($random == 46){
                $event->setDrops([Item::get(264, 0, $random3)]);
            }
            if ($random == 40){
                $event->setDrops([Item::get(264, 0, $random3)]);
            }
            if ($random == 4){
                $event->setDrops([Item::get(57, 0, $random2)]);
            }

            if ($random == 5){
                $event->setDrops([Item::get(388, 0, $random3)]);
            }
            if ($random == 34){
                $event->setDrops([Item::get(388, 0, $random3)]);
            }
            if ($random == 37){
                $event->setDrops([Item::get(388, 0, $random3)]);
            }
            if ($random == 38){
                $event->setDrops([Item::get(388, 0, $random3)]);
            }
            if ($random == 47){
                $event->setDrops([Item::get(388, 0, $random3)]);
            }
            if ($random == 48){
                $event->setDrops([Item::get(388, 0, $random3)]);
            }
            if ($random == 49){
                $event->setDrops([Item::get(388, 0, $random3)]);
            }
            if ($random == 6){
                $event->setDrops([Item::get(133, 0, $random2)]);
            }


            //X2
            if ($random == 7) {
                $event->setDrops([Item::get(265, 0, $random3)]);
            }
            if ($random == 8) {
                $event->setDrops([Item::get(42, 0, $random2)]);
            }
            if ($random == 13) {
                $event->setDrops([Item::get(265, 0, $random3)]);
            }

            if ($random == 9){
                $event->setDrops([Item::get(264, 0, $random3)]);
            }
            if ($random == 10){
                $event->setDrops([Item::get(57, 0, $random2)]);
            }

            if ($random == 11){
                $event->setDrops([Item::get(264, 0, $random3)]);
            }
            if ($random == 12){
                $event->setDrops([Item::get(42, 0, $random2)]);
            }


            //X3
            if ($random == 15) {
                $event->setDrops([Item::get(265, 0, $random3)]);
            }
            if ($random == 16) {
                $event->setDrops([Item::get(42, 0, $random2)]);
            }
            if ($random == 17) {
                $event->setDrops([Item::get(265, 0, $random3)]);
            }

            if ($random == 18){
                $event->setDrops([Item::get(264, 0, $random3)]);
            }
            if ($random == 19){
                $event->setDrops([Item::get(57, 0, $random2)]);
            }

            if ($random == 20){
                $event->setDrops([Item::get(388, 0, $random3)]);
            }
            if ($random == 21){
                $event->setDrops([Item::get(133, 0, $random2)]);
            }

            //X4
            if ($random == 24) {
                $event->setDrops([Item::get(265, 0, $random3)]);
            }
            if ($random == 25) {
                $event->setDrops([Item::get(42, 0, $random2)]);
            }

            if ($random == 26){
                $event->setDrops([Item::get(264, 0, $random3)]);
            }
            if ($random == 27){
                $event->setDrops([Item::get(57, 0, $random2)]);
            }

            if ($random == 28){
                $event->setDrops([Item::get(388, 0, $random3)]);
            }
            if ($random == 29){
                $event->setDrops([Item::get(133, 0, $random2)]);
            }


            //PLUTONIUM
            if ($random == 22){
                $event->setDrops([Item::get(414, 0, $random5)]);
            }
            if ($random == 50){
                $event->setDrops([Item::get(414, 0, $random5)]);
            }
            if ($random == 23){
                $event->setDrops([Item::get(370, 0, $random5)]);
            }

            if ($random == 30){
                $event->setDrops([Item::get(414, 0, $random5)]);
            }
            if ($random == 31){
                $event->setDrops([Item::get(370, 0, $random5)]);
            }


            if ($random == 14){
                $event->setDrops([Item::get(266, 0, $random4)]);
                $level2 = $player->getLevel();
                $level2->broadcastLevelSoundEvent($player->getPosition(), LevelSoundEventPacket::SOUND_RECORD_CAT);
                $this->getServer()->broadcastMessage("§b[§aOreBox§b] §e§l$playername §r§dà obtenu §e$random4 §dlingot(s) de Plutonium !");
            }

        }
    }
}