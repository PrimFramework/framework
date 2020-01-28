<?php

/**
 * Implementation of the TemplateEngineInterface.
 * 
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Internal;

use League\Plates\Engine;
use Prim\Framework\Internal\Policy\TemplateEngineInterface;

class TemplateEngine extends Engine implements TemplateEngineInterface
{

    /**
     * @inheritDoc
     */
    public function renderTemplate(string $name, array $data = []): string
    {
        return $this->render($name, $data);
    }
}