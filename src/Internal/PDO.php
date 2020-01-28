<?php

/**
 * Extend PDO to override the constructor.
 * 
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Internal;

use PDO as RawPDO;
use Prim\Framework\Internal\Policy\SettingsInterface;

class PDO extends RawPDO
{

    /**
     * Override the default constructor so we can accept the Settings object and
     * use the settings to call the parent constructor.
     * 
     * @param SettingsInterface $settings
     */
    public function __construct(SettingsInterface $settings)
    {
        // Assemble the DSN from the settings.
        $dsn = $settings->get('db.driver')
            . ":host="
            . $settings->get('db.host')
            . ";dbname="
            . $settings->get('db.database');

        // Set some relatively sane default options.
        $options = [
            RawPDO::ATTR_PERSISTENT => true,
            RawPDO::ATTR_ERRMODE => RawPDO::ERRMODE_EXCEPTION,
            RawPDO::ATTR_DEFAULT_FETCH_MODE => RawPDO::FETCH_OBJ
        ];

        // Call the parent constructor.
        parent::__construct(
            $dsn,
            $settings->get('db.username'),
            $settings->get('db.password'),
            $options
        );
    }
}