<?php

namespace ACore\Characters;

use ACore\Characters\CharDBProvider;
use ACore\Characters\CharDBTrait;
use ACore\System\Module;

abstract class CharDBModule extends Module implements CharDBProvider {
    use CharDBTrait;
}

