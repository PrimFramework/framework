<?php

/**
 * Example model.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Model;

class Example
{

    /**
     * Example data as we're not making assumptions about data persistence.
     * @var array $exampleData
     */
    private $exampleData = [
        1 => [
            'id' => 1,
            'message' => 'Hello, world!'
        ],
        2 => [
            'id' => 2,
            'message' => 'Foo bar baz.'
        ],
        3 => [
            'id' => 3,
            'message' => 'Purple monkey dishwasher.'
        ]
    ];


    /**
     * @var int $id
     * @var string $message
     */
    protected $id;
    protected $message;


    /**
     * If an ID is specified, use the example data to populate the object.
     *
     * @param string $id
     */
    public function __construct(string $id = null)
    {
        if (!is_null($id)) {
            $idInt = intval($id);
            if (array_key_exists($idInt, $this->exampleData)) {
                $this->id = $this->exampleData[$idInt]['id'];
                $this->message = $this->exampleData[$idInt]['message'];
            }
        }
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }


    /**
     * @param string $message
     * @return void
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
