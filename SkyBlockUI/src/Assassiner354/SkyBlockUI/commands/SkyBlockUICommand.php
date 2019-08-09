<?php

namespace Assassiner354\SkyBlockUI\commands;

use Assassiner354\SkyBlockUI\libs\jojoe77777\FormAPI\SimpleForm;
use pocketmine\Player;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\utils\InvalidCommandSyntaxException;
use pocketmine\entity\Entity;
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\math\Vector3;
use pocketmine\utils\TextFormat;

use Assassiner354\SkyBlockUI\Core;

class SkyBlockUICommand extends PluginCommand {

    /** @var Loader */
    private $main;

    public function __construct(Core $main) {
        parent::__construct("skyblockui", $main);
        $this->main = $main;
        $this->setDescription("SkyBlockUI!");
        $this->setAliases(["sbui"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if(!$this->testPermission($sender)) {
            return true;
        }
        $this->main->functions->sbUI($sender);
        return true;
    }
}