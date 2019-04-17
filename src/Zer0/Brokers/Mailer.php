<?php

namespace Zer0\Brokers;

use PHPDaemon\Core\ClassFinder;
use Zer0\Config\Interfaces\ConfigInterface;

/**
 * Class Mailer
 * @package Zer0\Brokers
 */
class Mailer extends Base
{

    /**
     * @param ConfigInterface $config
     * @return \Zer0\Mailer\Base
     */
    public function instantiate(ConfigInterface $config): \Zer0\Mailer\Base
    {
        $class = ClassFinder::find($config->type ?? 'Plain', ClassFinder::getNamespace(\Zer0\Mailer\Base::class), '~');
        return new $class($config);
    }

    /**
     * @param string $name
     * @param bool $caching
     * @return \Zer0\Mailer\Base
     */
    public function get(string $name = '', bool $caching = true): \Zer0\Mailer\Base
    {
        return parent::get($name, $caching);
    }
}
