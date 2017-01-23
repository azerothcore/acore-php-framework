<?php

namespace ACore\Auth;

use ACore\Auth\AuthDBProvider;
use ACore\Auth\AuthDBTrait;
use ACore\System\Module;

abstract class AuthDBModule extends Module implements AuthDBProvider {

    use AuthDBTrait;
}
