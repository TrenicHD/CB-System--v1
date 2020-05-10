<?php

namespace Trenic\CB\Inventory;

use CB\Main;
use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\inventory\transaction\action\SlotChangeAction;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\Task;
use pocketmine\utils\TextFormat;

class Inv extends PluginBase {

    public $plugin;

    public $player;

    public function __construct(AdminTool $plugin, Player $player){
        $this->plugin = $plugin;
        $this->player = $player;
        if (!InvMenuHandler::isRegistered()) {
            InvMenuHandler::register($plugin);
        }

    }

    public function main(Player $player){

        $name = $player->getName();
        $menu = InvMenu::create(InvMenu::TYPE_CHEST);
        $menu->readonly();
        $menu->setName(TextFormat::DARK_RED . TextFormat::ESCAPE . "k!!!!!" . TextFormat::RESET . TextFormat::YELLOW . "AdminTool" . TextFormat::RESET . TextFormat::DARK_RED . TextFormat::ESCAPE . "k!!!!!");
        $inv = $menu->getInventory();

        $hide = Item::get(Item::DIAMOND);
        $hide->setCustomName(TextFormat::GREEN . "Tag");


        $uhide = Item::get(Item::DIRT);
        $uhide->setCustomName(TextFormat::GOLD . "Server");

        $exit = Item::get(351, 1, 1);
        $exit->setCustomName(TextFormat::RED . "Exit");

        $inv->setItem(11, $hide);
        $inv->setItem(15, $uhide);
        $inv->setItem(26, $exit);
        $menu->setListener([$this, "onTransaction"]);
        $menu->setListener(/**
         * @param Player $player
         * @param Item $itemClickedOn
         * @param Item $itemClickedwith
         * @param SlotChangeAction $inventoryAction
         * @return bool
         */ function(Player $player, item $itemClickedOn, Item $itemClickedwith, SlotChangeAction $inventoryAction): bool{
            if($itemClickedOn->getCustomName() == TextFormat::GREEN . "Tag"){
                $player->removeWindow($inventoryAction->getInventory());
                $player->sendMessage($this->plugin->prefix . "Du hast die Zeit auf Tag gestellt!");
                $player->getLevel()->setTime(6000);
            }
            if ($itemClickedOn->getCustomName() == TextFormat::GOLD . "Server"){
                $player->removeWindow($inventoryAction->getInventory());
                $this->plugin->getScheduler()->scheduleDelayedTask(new ClosureTask(
                    function(int $currentTick):void{
                        $this->server($this->player);
                        //some code here to run after 20 ticks (1 second)
                    }
                ), 5);

            }
            if($itemClickedOn->getCustomName() == TextFormat::RED . "Exit"){
                $player->removeWindow($inventoryAction->getInventory());
            }
            return true;
        });
        $menu->send($player);
    }

    public function onTransaction(Player $player, Item $itemTakenOut, Item $itemPutIn, SlotChangeAction $inventoryAction) : bool{
        if($itemTakenOut->isNull()){
            $player->removeWindow($inventoryAction->getInventory());
        }
        return true;
    }

    public function server(Player $player){

        $name = $player->getName();
        $menu = InvMenu::create(InvMenu::TYPE_HOPPER);
        $menu->readonly();
        $menu->setName(TextFormat::DARK_RED . TextFormat::ESCAPE . "k!!!!!" . TextFormat::RESET . TextFormat::YELLOW . "Server" . TextFormat::RESET . TextFormat::DARK_RED . TextFormat::ESCAPE . "k!!!!!");
        $inv = $menu->getInventory();

        $hide = Item::get(351, 10, 1);
        $hide->setCustomName(TextFormat::GOLD . "Reload");


        $uhide = Item::get(351, 8, 1);
        $uhide->setCustomName(TextFormat::RED . "Stop");

        $exit = Item::get(351, 1, 1);
        $exit->setCustomName(TextFormat::RED . "Exit");

        $inv->setItem(0, $hide);
        $inv->setItem(4, $uhide);
        $menu->setListener([$this, "onTransaction"]);
        $menu->setListener(function(Player $player, item $itemClickedOn, Item $itemClickedwith, SlotChangeAction $inventoryAction): bool{
            if($itemClickedOn->getCustomName() == TextFormat::GOLD . "Reload"){
                $player->removeWindow($inventoryAction->getInventory());
                $this->plugin->getServer()->dispatchCommand(new ConsoleCommandSender(), "reload");
                $player->sendMessage($this->plugin->prefix . TextFormat::GREEN ."Du hast nun erfolgreich den Server Reloaded");
            }
            if ($itemClickedOn->getCustomName() == TextFormat::RED . "Stop"){
                $player->removeWindow($inventoryAction->getInventory());
                $this->plugin->getServer()->dispatchCommand(new ConsoleCommandSender(), "stop");

            }
            if($itemClickedOn->getCustomName() == TextFormat::RED . "Exit"){
                $player->removeWindow($inventoryAction->getInventory());
                $player->getInventory()->clearAll();
            }
            return true;
        });
        $menu->send($player);
    }

}
