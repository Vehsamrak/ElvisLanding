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

    /** @var string */
    private $createdAt;

    /** @var string */
    private $authorName;

    /** @var string */
    private $title;

    /** @var string */
    private $text;


    /**
     * @param int    $id
     * @param string $createdAt
     * @param string $authorName
     * @param string $title
     * @param string $text
     */
    public function __construct(
        int $id,
        string $createdAt,
        string $authorName,
        string $title,
        string $text
    ) {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->authorName = $authorName;
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

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}
