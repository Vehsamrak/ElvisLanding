<?php

namespace Entity;

/**
 * @author Vehsamrak
 */
class News
{

    /** @var int */
    private $id;

    /** @var \DateTime */
    private $createdAt;

    /** @var int */
    private $authorId;

    /** @var string */
    private $title;

    /** @var string */
    private $text;


    /**
     * @param int    $id
     * @param int    $authorId
     * @param string $title
     * @param string $text
     */
    public function __construct(int $id, int $authorId, string $title, string $text)
    {
        $this->id = $id;
        $this->createdAt = new \DateTime();
        $this->authorId = $authorId;
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i');
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
