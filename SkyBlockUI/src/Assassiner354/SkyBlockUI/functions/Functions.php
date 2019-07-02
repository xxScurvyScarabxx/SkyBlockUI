<?php

namespace Assassiner354\SkyBlockUI\functions;

use pocketmine\Player;

use Assassiner354\SkyBlockUI\Core;
use jojoe77777\FormAPI;

class Functions {

	private $plugin;

	public function __construct(Core $plugin){
    $this->plugin = $plugin;
	}

	public function memberAdd(Player $player) {
		$api = $this->plugin->getServer()->getPluginManager()->getPlugin("FormAPI");
    $form = $api->createCustomForm(function (Player $p, $data){
      if($data !== null){
      }
    });
    $form->setTitle("§lADD MEMBER");
   	$form->addLabel("Please write the IGN on the box.");
    $form->addInput("Player Name:", "Assassiner354");
    $form->sendToPlayer($sender);
	}
	public function memberRem(Player $player) {
		$api = $this->plugin->getServer()->getPluginManager()->getPlugin("FormAPI");
    $form = $api->createCustomForm(function (Player $p, $data){
      if($data !== null){
      }
    });
    $form->setTitle("§lREMOVE MEMBER");
    $form->addLabel("Please write the IGN on the box.");
    $form->addInput("Player Name:", "Assassiner354");
    $form->sendToPlayer($sender);
	}
}
