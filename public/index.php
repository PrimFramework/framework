<?php

/**
 * Entry point for the application.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

require_once("../vendor/autoload.php");

(new \KendallTristan\Prim\Kernel)->init();
