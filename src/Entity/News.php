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
    private $date;

    /** @var string */
    private $authorName;

    /** @var string */
    private $title;

    /** @var string */
    private $text;


    /**
     * @param int    $id
     * @param string $date
     * @param string $authorName
     * @param string $title
     * @param string $text
     */
    public function __construct(
        int $id,
        string $date,
        string $authorName,
        string $title,
        string $text
    ) {
        $this->id = $id;
        $this->date = $date;
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
    public function getDate(): string
    {
        return $this->date;
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
