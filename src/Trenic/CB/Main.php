<?php
/*##################################################

##################################################*/
namespace Trenic\CB;

use CB\Inventory\Inv;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use Cassandra\Time;
use pocketmine\command\defaults\SetWorldSpawnCommand;
use pocketmine\item\Item;
use pocketmine\network\mcpe\protocol\SetTimePacket;
use pocketmine\Player;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use bansystem\command\BanCommand;
use bansystem\command\BanIPCommand;
use bansystem\command\BanListCommand;
use bansystem\command\BlockCommand;
use bansystem\command\BlockIPCommand;
use bansystem\command\BlockListCommand;
use bansystem\command\KickCommand;
use bansystem\command\MuteCommand;
use bansystem\command\MuteIPCommand;
use bansystem\command\MuteListCommand;
use bansystem\command\PardonCommand;
use bansystem\command\PardonIPCommand;
use bansystem\command\TempBanCommand;
use bansystem\command\TempBanIPCommand;
use bansystem\command\TempBlockCommand;
use bansystem\command\TempBlockIPCommand;
use bansystem\command\TempMuteCommand;
use bansystem\command\TempMuteIPCommand;
use bansystem\command\UnbanCommand;
use bansystem\command\UnbanIPCommand;
use bansystem\command\UnblockCommand;
use bansystem\command\UnblockIPCommand;
use bansystem\command\UnmuteCommand;
use bansystem\command\UnmuteIPCommand;
use bansystem\listener\PlayerChatListener;
use bansystem\listener\PlayerCommandPreproccessListener;
use bansystem\listener\PlayerPreLoginListener;
use pocketmine\event\Listener;
use pocketmine\permission\Permission;
use pocketmine\plugin\Plugin;
use function pocketmine\server;

use pocketmine\Server;
use pocketmine\inventory\Inventory;


class Main extends PluginBase implements Listener
{

    public function onEnable()
    {
        $this->getLogger()->info(TextFormat::GREEN . "CB-System Aktiv! (code by TrenicHD,UnLegitLeon!)");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDisable()
    {
        $this->getLogger()->info(TextFormat::RED . "Plugin Deaktiviert!");
    }

    public function onJoinPlayer(PlayerJoinEvent $event)
    {
        $event->setJoinMessage($event->getPlayer()->getName() . "§b[§a+§b]");
    }

    public function onPlayerQuit(PlayerQuitEvent $event)
    {
        $event->setQuitMessage($event->getPlayer()->getName() . "§b[§4-§b]");
    }

    public function onCommand(CommandSender $player, Command $cmd, string $label, array $args): bool
    {
        switch ($cmd->getName()) {
            case "cb":
                if (empty($args[1])) {
                    if (!isset($args[0])) {
                        $sender = $player;
                        $sender->sendMessage("§c===CB-System seite 1/2===");
                        $sender->sendMessage(TextFormat::GRAY . "Usage: /cb <zahl>");
                        $sender->sendMessage(TextFormat::GRAY . "Usage: /gm <zahl>");
                        $sender->sendMessage(TextFormat::GRAY . "Usage: /day");
                        $sender->sendMessage(TextFormat::GRAY . "Usage: /night");
                        $sender->sendMessage(TextFormat::GRAY . "Usage: /chatclear");
                        $effect = new EffectInstance(Effect::getEffect(15), 50, 100, false);
                        $player->addEffect($effect);
                        return true;



                    } else {
                        $sender = $player;
                        if ($sender instanceof Player) {
                            if ($sender->hasPermission("info.use")) {
                                if (strtolower($args[0]) === "2") {
                                    $sender->sendMessage("§c===CB-System seite 2/3===");
                                    $sender->sendMessage(TextFormat::GRAY . "Usage: /heal");
                                    $sender->sendMessage(TextFormat::GRAY . "Usage: /food");
                                    $sender->sendMessage(TextFormat::GRAY . "Usage: /yt");
                                    $sender->sendMessage(TextFormat::GRAY . "Usage: /starterkit");
                                    $sender->sendMessage(TextFormat::GRAY . "Usage: /hub");     /*Nur für Buungecord server*/
                                    $effect = new EffectInstance(Effect::getEffect(15), 50, 100, false);
                                    $player->addEffect($effect);
                                    return true;


                                } else {
                                    if (strtolower($args[0]) === "3") {
                                        $sender->sendMessage("§c===CB-System seite 3/3===");
                                        $sender->sendMessage(TextFormat::GRAY . "Usage: /youtube");
                                        $sender->sendMessage(TextFormat::GRAY . "Usage: /bald...");
                                        $sender->sendMessage(TextFormat::GRAY . "Usage: /bald...");
                                        $sender->sendMessage(TextFormat::GRAY . "Usage: /bald...");
                                        $sender->sendMessage(TextFormat::GRAY . "Usage: /bald...");

                                        $effect = new EffectInstance(Effect::getEffect(15), 50, 100, false);
                                        $player->addEffect($effect);
                                        return true;
                                    } else {

                                    }
                                }
                            } else {
                                $player->sendMessage(TextFormat::BLUE . "========================");
                                $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                                $player->sendMessage(TextFormat::BLUE . "========================");
                                return true;
                            }
                        }
                        return true;
                    }
                }
        }
        switch ($cmd->getName()) {
            case "chatclear":
                if ($player instanceof Player) {
                    if ($player->hasPermission("chatclear.use")) {
                        $sender = $player->getName();
                        $name = $sender;
                        $this->getServer()->broadcastMessage("\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n" . "§bDer Chat wurde von §l§a[$name] §r§bGelöscht!");
                    }else{
                        $player->sendMessage(TextFormat::BLUE . "========================");
                        $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                        $player->sendMessage(TextFormat::BLUE . "========================");
                    }
                }
                break;
        }
        switch ($cmd->getName()) {
            case "heal":
                if ($player instanceof Player) {
                    if ($player->hasPermission("heal.use")) {
                        $sender = $player->getName();
                        $name = $sender;
                        $player->setHealth(20);
                        $player->sendPopup(TextFormat::RED . "§b Du wurdest geheilt!");
                    }else{
                        $player->sendMessage(TextFormat::BLUE . "========================");
                        $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                        $player->sendMessage(TextFormat::BLUE . "========================");
                    }
                }
                break;
        }
        switch ($cmd->getName()) {
            case "food":
                if ($player instanceof Player) {
                    if ($player->hasPermission("food.use")) {
                        $sender = $player->getName();
                        $name = $sender;
                        $player->setFood(20);
                        $player->sendPopup("§bDu wurdest gefüttert");
                    }else{
                        $player->sendMessage(TextFormat::BLUE . "========================");
                        $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                        $player->sendMessage(TextFormat::BLUE . "========================");
                    }
                }
                break;
        }
        switch ($cmd->getName()) {
            case "youtube":
                if ($player instanceof Player) {
                    if ($player->hasPermission("youtube.use")) {
                        $sender = $player->getName();
                        $name = $sender;
                        $player->sendMessage(TextFormat::AQUA . "Abonniere TrenicHD auf YouTube ");
                    }else{
                        $player->sendMessage(TextFormat::BLUE . "========================");
                        $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                        $player->sendMessage(TextFormat::BLUE . "========================");
                    }
                }
                break;
        }
        switch ($cmd->getName()) {
            case "yt":
                if ($player instanceof Player) {
                    if ($player->hasPermission("yt.use")) {
                        $player->sendMessage("§7-----------------------------------");
                        $player->sendMessage("§5Youtuber§7:§5 150 Abos (Conten on This Server)");
                        $player->sendMessage("§5Youtuber+§7:§5 300 Abos (Conten on This Server)");
                        $player->sendMessage("§7-----------------------------------");
                        $effect = new EffectInstance(Effect::getEffect(15), 50, 100, false);
                        $player->addEffect($effect);
                    }else{
                        $player->sendMessage(TextFormat::BLUE . "========================");
                        $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                        $player->sendMessage(TextFormat::BLUE . "========================");
                    }
                }
                break;
        }
        switch ($cmd->getName()) {  /*Für server mit Buungecord!*/
            case "hub":
                if ($player instanceof Player) {
                    if ($player->hasPermission("hub.use")) {
                        $player->sendMessage("§c---------------------");
                        $player->sendMessage(TextFormat::AQUA . "Teleportiere dich zum Hub....");
                        $player->sendMessage("§c-----------------------");
                        $this->getServer()->dispatchCommand($player, "transfer Lobby"); /*Wechsel "Lobby" mit deinen Spawn Server*/ {

                        }
                    }else{
                        $player->sendMessage(TextFormat::BLUE . "========================");
                        $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                        $player->sendMessage(TextFormat::BLUE . "========================");
                    }
                }
                break;
        }
        switch ($cmd->getName()) {
            case "invclear":
                if ($player instanceof Player) {
                    if ($player->hasPermission("invclear.use")) {
                        $sender = $player->getName();
                        $name = $sender;
                        $this->getServer()->broadcastMessage(TextFormat::GRAY . "======");
                        $this->getServer()->broadcastMessage("§b§lDer Spieler §6§l$name §b§lwar so mutig um sein Inventar zu Löschen!");
                        $this->getServer()->broadcastMessage(TextFormat::GRAY . "======");
                        $player->getInventory()->clearAll();
                        $player->addSubTitle(TextFormat::GRAY . "Dein Inventar wurde Gelöscht!");
                        $effect = new EffectInstance(Effect::getEffect(15), 50, 100, false);
                        $player->addEffect($effect);
                    }else{
                        $player->sendMessage(TextFormat::BLUE . "========================");
                        $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                        $player->sendMessage(TextFormat::BLUE . "========================");
                    }
                }
                break;
        }
        switch ($cmd->getName()) {
            case "starterkit":

                if (!isset($this->cooldownList[$player->getName()])) {
                    $this->cooldownList[$player->getName()] = time() + 3728723782782378237823823778237;
                    if ($player instanceof Player) {
                        if ($player->hasPermission("starterkit.use")) {
                            $sender = $player;
                            $name = $player->getName();
                            $sender->getInventory()->addItem(new Item(ITEM::STONE_SWORD, 0, 1));
                            $sender->getInventory()->addItem(new Item(ITEM::STONE_AXE, 0, 1));
                            $sender->getInventory()->addItem(new Item(ITEM::STONE_PICKAXE, 0, 1));
                            $sender->getInventory()->addItem(new Item(ITEM::STEAK, 0, 32));
                            $this->getServer()->broadcastMessage(TextFormat::GRAY . "======");
                            $this->getServer()->broadcastMessage("§b§lDer Spieler §6§l$name §b§lhat das Starter Kit erhalten!");
                            $this->getServer()->broadcastMessage(TextFormat::GRAY . "======");
                            $effect = new EffectInstance(Effect::getEffect(15), 50, 100, false);
                            $player->addEffect($effect);

                        } else {
                            if (time() < $this->cooldownList[$player->getName()]) {

                                $remaining = $this->cooldownList[$player->getName()] - time();
                            } else {
                                unset($this->cooldownList[$player->getName()]);
                            }
                        }
                    }
                }
                break;
        }
        switch ($cmd->getName()) {
            case "night":
                if ($player instanceof Player) {
                    if ($player->hasPermission("time.use")) {
                        $player->getLevel()->setTime(16000);
                        $player->sendPopup("§bDie Zeit wurde auf Nacht gesetzt");

                        }else{
                        $player->sendMessage(TextFormat::BLUE . "========================");
                        $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                        $player->sendMessage(TextFormat::BLUE . "========================");
                    }
                }
                break;
        }
        switch ($cmd->getName()) {
            case "bald":
                if ($player instanceof Player) {
                    if ($player->hasPermission("bald.use")) {
                        $player->sendMessage(TextFormat::RED . "Die Developer TrenicHD und UnLegitLeon");
                        $player->sendMessage(TextFormat::RED . "Arbeiten schon an der Neuen Version!");
                        $player->sendMessage(TextFormat::RED . "Weitere Infomationen Findest du unter:");#
                        $player->sendMessage(TextFormat::RED . "https://discord.gg/EFKHvcu");
                        $player->sendMessage(TextFormat::RED . "https://www.youtube.com/channel/UCkH1MkgKy72wGbX8x4mt2yA/");

                        }else{
                        $player->sendMessage(TextFormat::BLUE . "========================");
                        $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                        $player->sendMessage(TextFormat::BLUE . "========================");
                    }
                }
                break;
        }
        switch ($cmd->getName()) {
            case "day":
                if ($player instanceof Player) {
                    if ($player->hasPermission("time.use")) {
                        $player->getLevel()->setTime(6000);
                        $player->sendPopup("§bDie Zeit wurde auf Tag gesetzt");

                    }else{
                        $player->sendMessage(TextFormat::BLUE . "========================");
                        $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                        $player->sendMessage(TextFormat::BLUE . "========================");
                    }
                }
                break;
        }
        switch ($cmd->getName()){
            case "gm":
                if ($player instanceof Player) {
                    if ($player->hasPermission("gm.use")) {
                        $this->OpenUI($player);
                    } else {
                        $player->sendMessage(TextFormat::BLUE . "========================");
                        $player->sendMessage(TextFormat::RED . "Du hast Keine Rechte!");
                        $player->sendMessage(TextFormat::BLUE . "========================");
                    }
                }
                break;
        }
        return true;
    }
    public function GM0($player){
        $player->setGamemode(0);
        $player->sendMessage(TextFormat::GREEN . "Du bist in Gamemode 0");
    }

    public function GM1($player){
        $player->setGamemode(1);
        $player->sendMessage(TextFormat::GREEN . "Du bist in Gamemode 1");
    }

    public function GM3($player){
        $player->setGamemode(3);
        $player->sendMessage(TextFormat::GREEN . "Du bist in Gamemode 3");
    }

    public function GM2($player){
        $player->setGamemode(2);
        $player->sendMessage(TextFormat::GREEN . "Du bist in Gamemode 2");
    }

    public function OpenUI($player)
    {
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $player, int $data = null) {
            $result = $data;
            if ($result === null) {
                return true;
            }
            switch ($result) {
                case 0:
                    $this->GM0($player);
                    break;

                case 1:
                    $this->GM1($player);
                    break;

                case 2:
                    $this->GM2($player);
                    break;

                case 3:
                    $this->GM3($player);
                    break;
            }
        });
        $form->setTitle("===§5Gamemode§r===");
        $form->addButton("§2Gamemode 0");
        $form->addButton("§bGamemode 1");
        $form->addButton("§cGamemode 2");
        $form->addButton("§6Gamemode 3");
        $form->sendToPlayer($player);
        return $form;
    }
}
