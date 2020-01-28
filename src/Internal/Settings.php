<?php

/**
 * Default SettingsInterface implementation that reads env.ini.
 */

declare(strict_types=1);

namespace Prim\Framework\Internal;

use Prim\Framework\Internal\Policy\SettingsInterface;

class Settings implements SettingsInterface
{

    /**
     * @var array
     */
    protected $settings = [];


    /**
     * While constructing, set some path settings and read the env.ini file.
     */
    public function __construct()
    {
        $this->set('path.root', dirname(__FILE__, 3));
        $this->set('path.env', dirname(__FILE__, 3) . "/env.ini");
        $this->set('path.views', dirname(__FILE__, 2) . "/View");

        // Read .env.ini and sort the data into settings.
        $envData = parse_ini_file($this->get('path.env'), true, INI_SCANNER_TYPED);
        foreach ($envData as $section => $data) {
            foreach ($data as $key => $value) {
                $this->set("{$section}.{$key}", $value);
            }
        }
    }


    /**
     * @inheritDoc
     */
    public function get(string $setting)
    {
        return $this->settings[$setting];
    }


    /**
     * @inheritDoc
     */
    public function set(string $setting, $value): SettingsInterface
    {
        $this->settings[$setting] = $value;
        return $this;
    }
}