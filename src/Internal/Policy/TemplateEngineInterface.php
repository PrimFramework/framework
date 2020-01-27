<?php

/**
 * Interface for defining interactions with templating systems.
 */

declare(strict_types=1);

namespace Prim\Framework\Internal\Policy;

interface TemplateEngineInterface
{
    /**
     * Render the template and output it as a string.
     *
     * @param string $name
     * @param array $data
     * @return string
     */
    public function renderTemplate(string $name, array $data = []): string;
}