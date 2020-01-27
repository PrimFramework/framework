<?php



namespace Prim\Framework\Internal;

use League\Plates\Engine;
use Prim\Framework\Internal\Policy\TemplateEngineInterface;

class TemplateEngine extends Engine implements TemplateEngineInterface
{
    /**
     * @inheritdoc
     */
    public function renderTemplate(string $name, array $data = []): string
    {
        return $this->render($name, $data);
    }
}