<?php

namespace lentou\AntiLiquidFlow;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockSpreadEvent;
use pocketmine\block\Liquid;

class Main extends PluginBase implements Listener {
	
	public function onEnable() : void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	/**
	 * @ignoreCancelled false
	 * @priority LOWEST
	 *
	 * @param BlockSpreadEvent $event
	 */
	public function onBlockSpread(BlockSpreadEvent $event) : void {
		if ($event->isCancelled()) {
			return;
		}
		if ($event->getSource() instanceof Liquid) {
			if ($event->getNewState()->getDamage() >= 3) {
				$event->setCancelled();
			}
		}
	}
	
}
