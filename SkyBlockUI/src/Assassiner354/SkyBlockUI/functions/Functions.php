<?php

namespace Assassiner354\SkyBlockUI\functions;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};

use Assassiner354\SkyBlockUI\Core;
use Assassiner354\SkyBlockUI\libs\jojoe77777\FormAPI\CustomForm;
use Assassiner354\SkyBlockUI\libs\jojoe77777\FormAPI\SimpleForm;

class Functions {

	private $plugin;

	public function __construct(Core $plugin){
        $this->plugin = $plugin;
	}

	public function sbUI(Player $player) {
        $form = new SimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                case 0:
                    break;
                case 1:
                    $this->SBIsland($sender);
                    break;
                case 2:
                    $this->SBManage($sender);
                    break;
                case 3:
                    $this->memberManage($sender);
                    break;
                case 4:
                    $this->inviteMenu($sender);
                    break;
                case 5:
                    $sender->getServer()->dispatchCommand($sender, "is help");
                    break;
            }
        });
        $form->setTitle("§lSKYBLOCK UI");
        $form->setContent("§fSelect an option!");
        $form->addButton("§cExit", 0);
        $form->addButton("§8Island Creation\n§d§l»§r §8Tap to select!", 1);
        $form->addButton("§8Island Management\n§d§l»§r §8Tap to select!", 2);
        $form->addButton("§8Member Management\n§d§l»§r §8Tap to select!", 3);
        $form->addButton("§8Invite Management\n§d§l»§r §8Tap to select!", 4);
        $form->addButton("§8Help\n§d§l»§r §8Tap to select!", 5);
        $form->sendToPlayer($player);
    }

    public function SBIsland(Player $sender) {
        $form = new SimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                case 0:
                    $this->sbUI($sender);
                    break;
                case 1:
                    $sender->getServer()->dispatchCommand($sender, "is create Basic");
                    break;
                case 2:
                    $sender->getServer()->dispatchCommand($sender, "is create Lost");
                    break;
                case 3:
                    $sender->getServer()->dispatchCommand($sender, "is create OP");
                    break;
                case 4:
                    $sender->getServer()->dispatchCommand($sender, "is create Palm");
                    break;
                case 5:
                    $sender->getServer()->dispatchCommand($sender, "is create");
                    break;
            }
        });
        $form->setTitle("§lISLAND CREATION");
        $form->setContent("§fSelect an island to create!");
        $form->addButton("§cBack", 0);
        $form->addButton("§8Basic Island\n§d§l»§r §8Tap to create!", 1, "textures/blocks/grass_side_carried");
        $form->addButton("§8Lost Island\n§d§l»§r §8Tap to create!", 2, "textures/blocks/end_bricks");
        $form->addButton("§8OP Island\n§d§l»§r §8Tap to create!", 3, "textures/blocks/gold_block");
        $form->addButton("§8Palm Island\n§d§l»§r §8Tap to create!", 4, "textures/blocks/log_jungle");
        $form->addButton("§8Default Island\n§d§l»§r §8Tap to create!", 5, "textures/blocks/sapling_oak");
        $form->sendToPlayer($sender);
    }

    public function SBManage(Player $sender) {
        $form = new SimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                case 0:
                    $this->sbUI($sender);
                    break;
                case 1:
                    $sender->getServer()->dispatchCommand($sender, "is join");
                    break;
                case 2:
                    $sender->getServer()->dispatchCommand($sender, "is disband");
                    break;
                case 3:
                    $sender->getServer()->dispatchCommand($sender, "is lock");
                    break;
            }
        });
        $form->setTitle("§lISLAND MANAGEMENT");
        $form->setContent("§fManage your island!");
        $form->addButton("§cBack", 0);
        $form->addButton("§8Join Island\n§d§l»§r §8Tap to select!", 1);
        $form->addButton("§8Disband Island\n§d§l»§r §8Tap to select!", 2);
        $form->addButton("§8Lock Island\n§d§l»§r §8Tap to select!", 3);
        $form->sendToPlayer($sender);
    }

    public function memberManage(Player $sender) {
        $form = new SimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                case 0:
                    $this->sbUI($sender);
                    break;
                case 1:
                    $this->memberAdd($sender);
                    break;
                case 2:
                    $this->memberRem($sender);
                    break;
            }
        });
        $form->setTitle("§lMEMBER MANAGEMENT");
        $form->setContent("§fManage your island members!");
        $form->addButton("§cBack", 0);
        $form->addButton("§8Add Member\n§d§l»§r §8Tap to select!", 1);
        $form->addButton("§8Remove Member\n§d§l»§r §8Tap to select!", 2);
        $form->sendToPlayer($sender);
    }

	public function memberAdd(Player $player) {
        $form = new CustomForm(function (Player $p, $data){
            if($data !== null){
            }
        });
        $form->setTitle("§lADD MEMBER");
        $form->addLabel("Please write the IGN on the box.");
        $form->addInput("Player Name:", "Steve");
        $form->sendToPlayer($player);
	}

	public function memberRem(Player $player) {
        $form = new CustomForm(function (Player $p, $data){
            if($data !== null){
            }
        });
        $form->addLabel("Please write the IGN on the box.");
        $form->addInput("Player Name:", "Steve");
        $form->sendToPlayer($player);
	}

    public function inviteForm(Player $player) {
        $form = new CustomForm(function (Player $p, $data){
            if($data !== null){
            }
        });
        $form->addLabel("Please write the IGN on the box.");
        $form->addInput("Player Name:", "Steve");
        $form->sendToPlayer($player);
    }

    public function inviteMenu(Player $player) {
        $form = new SimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                case 0:
                    break;
                case 1:
                    $sender->getServer()->dispatchCommand($sender, "is accept");
                    break;
                case 2:
                    $sender->getServer()->dispatchCommand($sender, "is deny");
                    break;
                case 3:
                    $this->inviteForm($sender);
                    break;
            }
        });
        $form->setTitle("§lINVITE MENU");
        $form->setContent("§fSelect an option!");
        $form->addButton("§cBack", 0);
        $form->addButton("§8Accept Invite\n§d§l»§r §8Tap to select!", 1);
        $form->addButton("§8Deny Invite\n§d§l»§r §8Tap to select!", 2);
        $form->addButton("§8Invite Player\n§d§l»§r §8Tap to select!", 3);
        $form->sendToPlayer($player);
    }
}
