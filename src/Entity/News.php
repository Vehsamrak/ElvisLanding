<?php

namespace Entity;

/**
 * News entry
 * @author Vehsamrak
 */
class News
{

    /** @var int */
    private $id;

    /** @var \DateTime */
    private $createdAt;

    /** @var string */
    private $author;

    /** @var string */
    private $title;

    /** @var string */
    private $text;


    /**
     * @param int    $id
     * @param string $author
     * @param string $title
     * @param string $text
     */
    public function __construct(int $id, string $author, string $title, string $text)
    {
        $this->id = $id;
        $this->createdAt = new \DateTime();
        $this->authorId = $author;
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

    public function getAuthor(): string
    {
        return $this->author;
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
