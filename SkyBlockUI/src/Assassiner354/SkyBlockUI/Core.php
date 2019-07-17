<?php

/**
 * Copyright 2019 Assassiner354
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Assassiner354\SkyBlockUI;

use pocketmine\plugin\PluginBase;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

//use Assassiner354\SkyBlockUI\functions\Functions;
use Assassiner354\SkyBlockUI\libs\jojoe77777\FormAPI\SimpleForm;

class Core extends PluginBase {

	public function onEnable() {
		$this->getLogger()->info("SkyBlockUI has been enabled by Assassiner354!");
		//$this->functions = new Functions($this); DISABLED FOR NOW!

		#Dependency Check!
		#Checks if SkyBlock is enabled on the server!
		$sb = $this->getServer()->getPluginManager()->getPlugin("SkyBlock");
		if(is_null($sb)) {
			$this->getLogger()->notice("Please install SkyBlock by GiantQuartz to use this plugin!");
			$this->getServer()->shutdown();
		}

		#DO NOT EDIT!
		if($this->getDescription()->getAuthors()[0] !== "Assassiner354" || $this->getDescription()->getName() !== "SkyBlockUI"){
			$this->getLogger()->notice("Fatal error! Unallowed modification/use of SkyBlockUI by Assassiner354 (@RealA354)!");
			$this->getServer()->shutdown();
		}
	}

	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
		switch($cmd->getName()){
			case "sbui":
			case "skyblockui":
				if(!$sender instanceof Player){
			        $sender->sendMessage("§c§l» §r§7This command can't be used here.");
			        return true;
        		}
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
						//$this->MemberManage($sender);
						$sender->sendMessage("§c§l» §r§7Coming soon!");
						break;
					case 4:
						$sender->getServer()->dispatchCommand($sender, "is " . "help");
						break;
				}
				});
				$form->setTitle("§lSKYBLOCK UI");
		        $form->setContent("§fSelect an option!");
		        $form->addButton("§cExit", 0);
		        $form->addButton("§8Island Creation\n§d§l»§r §8Tap to select!", 1);
		        $form->addButton("§8Island Management\n§d§l»§r §8Tap to select!", 2);
		        $form->addButton("§8Member Management\n§d§l»§r §8Tap to select!", 3);
		        $form->addButton("§8Help\n§d§l»§r §8Tap to select!", 4);
		        $form->sendToPlayer($sender);
  		}
  		return true;
	}

    public function SBIsland(Player $sender) {
  		$form = new SimpleForm(function (Player $sender, $data){
  		$result = $data;
  		if ($result == null) {
  		}
  		switch ($result) {
		  	case 0:
		        $sender->getServer()->dispatchCommand($sender, "sbui");
		      break;
			case 1:
				$sender->getServer()->dispatchCommand($sender, "is " . "create " . "Basic");
				break;
			case 2:
				$sender->getServer()->dispatchCommand($sender, "is " . "create " . "Lost");
				break;
			case 3:
				$sender->getServer()->dispatchCommand($sender, "is " . "create " . "OP");
				break;
			case 4:
				$sender->getServer()->dispatchCommand($sender, "is " . "create " . "Palm");
				break;
			case 5:
				$sender->getServer()->dispatchCommand($sender, "is " . "create");
				break;
		}
		});
		$form->setTitle("§lISLAND CREATION");
		$form->setContent("§fSelect an island to create!");
		$form->addButton("§cBack", 0);
		$form->addButton("§8Basic Island\n§d§l»§r §8Tap to create!", 1);
		$form->addButton("§8Lost Island\n§d§l»§r §8Tap to create!", 2);
		$form->addButton("§8OP Island\n§d§l»§r §8Tap to create!", 3);
		$form->addButton("§8Palm Island\n§d§l»§r §8Tap to create!", 4);
		$form->addButton("§8Default Island\n§d§l»§r §8Tap to create!", 5);
		$form->sendToPlayer($sender);
	}

    public function SBManage(Player $sender) {
		$form = new SimpleForm(function (Player $sender, $data){
		$result = $data;
		if ($result == null) {
		}
		switch ($result) {
			case 0:
				$sender->getServer()->dispatchCommand($sender, "sbui");
				break;
			case 1:
				$sender->getServer()->dispatchCommand($sender, "is " . "join");
				break;
			case 2:
				$sender->getServer()->dispatchCommand($sender, "is " . "disband");
				break;
			case 3:
				$sender->getServer()->dispatchCommand($sender, "is " . "lock");
				break;
		}
		});
		$form->setTitle("§lISLAND MANGEMENT");
		$form->setContent("§fManage your island!");
		$form->addButton("§cBack", 0);
		$form->addButton("§8Join Island\n§d§l»§r §8Tap to select!", 1);
		$form->addButton("§8Disband Island\n§d§l»§r §8Tap to select!", 2);
		$form->addButton("§8Lock Island\n§d§l»§r §8Tap to select!", 3);
		$form->sendToPlayer($sender);
	}

		#COMING SOON!
    /* public function memberManage(Player $sender) {

      $form = new SimpleForm(function (Player $sender, $data){
          $result = $data;
          if ($result == null) {
          }
          switch ($result) {
          	case 0:
	            $sender->getServer()->dispatchCommand($sender, "sbui");
              break;
						case 1:
							$this->functions->memberAdd($sender);
							break;
						case 2:
							$this->functions->memberRem($sender);
							break;
					}
			});
			$form->setTitle("§lMEMBER MANGEMENT");
		  $form->setContent("§fManage your island members!");
		  $form->addButton("§cBack", 0);
		  $form->addButton("§8Add Member\n§d§l»§r §8Tap to select!", 1);
		  $form->addButton("§8Remove Member\n§d§l»§r §8Tap to select!", 2);
		  $form->sendToPlayer($sender);
    } */
}
