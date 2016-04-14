<?php

namespace Slonworks\Elvisland\Entity;

/**
 * @author Vehsamrak
 */
class News
{

    /** @var \DateTime */
    private $createdAt;

    /** @var int */
    private $authorId;

    /** @var string */
    private $title;

    /** @var string */
    private $text;

    /**
     * @param int    $authorId
     * @param string $title
     * @param string $text
     */
    public function __construct(int $authorId, string $title, string $text)
    {
        $this->createdAt = new \DateTime();
        $this->authorId = $authorId;
        $this->title = $title;
        $this->text = $text;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i');
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
