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
     * @param int|null $id
     * @param string   $date
     * @param string   $authorLogin
     * @param string   $authorName
     * @param string   $title
     * @param string   $text
     */
    public function __construct(
        int $id,
        string $date,
        string $authorLogin,
        string $authorName,
        string $title,
        string $text
    ) {
        $this->id = $id;
        $this->date = $date;
        $this->authorLogin = $authorLogin;
        $this->authorName = $authorName;
        $this->title = $title;
        $this->text = $text;
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
}
