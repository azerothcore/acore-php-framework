<?php

namespace ACore\Soap;

use ACore\System\Module;

abstract class SoapModule extends Module implements SoapProvider {

    use SoapTrait;
}
