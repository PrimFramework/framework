<?php

/**
 * Interface for describing how settings classes should be implemented.
 * 
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Internal\Policy;

interface SettingsInterface
{

    /**
     * Retrieve a setting.
     * 
     * @param string $setting
     * @return mixed
     */
    public function get(string $setting);


    /**
     * Set a setting.
     *
     * @param string $setting
     * @param mixed $value
     * @return SettingsInterface
     */
    public function set(string $setting, $value): SettingsInterface;
}