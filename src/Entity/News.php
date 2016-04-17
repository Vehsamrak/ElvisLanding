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
    private $authorLogin;

    /** @var string */
    private $authorName;

    /** @var string */
    private $title;

    /** @var string */
    private $text;

    /**
     * @param string   $date
     * @param string   $authorLogin
     * @param string   $authorName
     * @param string   $title
     * @param string   $text
     */
    public function __construct(
        string $date,
        string $authorLogin,
        string $authorName,
        string $title,
        string $text
    ) {
        $this->date = $date;
        $this->authorLogin = $authorLogin;
        $this->authorName = $authorName;
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getAuthorLogin(): string
    {
        return $this->authorLogin;
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
    public function getTitle(): string
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

    /**
     * Is news post created and not yet persisted to database
     * @return bool
     */
    public function isNew()
    {
        return (bool) !$this->id;
    }
}
