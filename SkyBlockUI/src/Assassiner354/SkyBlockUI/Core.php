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

use Assassiner354\SkyBlockUI\commands\SkyBlockUICommand;
use Assassiner354\SkyBlockUI\functions\Functions;

class Core extends PluginBase {

    /**
     * @var Functions
     */
    public $functions;

    public function onEnable() {
	    $this->functions = new Functions($this);
	    $this->registerCommands();

		#DO NOT EDIT!
		if($this->getDescription()->getAuthors()[0] !== "Assassiner354" || $this->getDescription()->getName() !== "SkyBlockUI"){
			$this->getLogger()->notice("Fatal error! Illegal modification/use of SkyBlockUI by Assassiner354 (@RealA354)!");
			$this->getServer()->shutdown();
		}
	}

	public function registerCommands() : void{
        $this->getServer()->getCommandMap()->registerAll("SkyBlockUI", [
            new SkyBlockUICommand($this),
        ]);
    }
}
