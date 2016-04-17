<?php

namespace Controller;

use Exception\AuthorNotFound;
use Service\NewsProcessor;
use Vehsamrak\Vehsa\AbstractController;

/**
 * @author Vehsamrak
 */
class NewsController extends AbstractController
{

    /**
     * Add news post
     */
    public function addAction()
    {
        $author = $this->getParameter('author');
        $title = $this->getParameter('title');
        $text = $this->getParameter('text');
        $date = $this->validateAndCreateDate($this->getParameter('date'));
        $errors = [];

        if (!$author || !$title || !$text || !$date) {
            $errors[] = 'You must provide author, title and text to post news.';
        }

        if (empty($errors)) {
            $newsProcessor = new NewsProcessor();

            try {
                $newsProcessor->addNews($date, $author, $title, $text);
            } catch (AuthorNotFound $authorNotFoundException) {
                $errors[] = 'Author not found.';
            }
        }

        $this->render('news', ['errors' => $errors]);
    }

    /**
     * Check validity of date string and create a dateTime from it
     * explode is limited to return 3 tokens (so that if the input is "1-2-3-4", $d will become "3-4")
     * ctype_digit is used to make sure that the input does not contain any non-numeric characters
     * array_pad is used (with a default value that will cause checkdate to fail) to make sure that
     * enough elements are returned so that if the input is "1-2" list() will not emit a notice
     * @see http://stackoverflow.com/questions/13194322/php-regex-to-check-date-is-in-yyyy-mm-dd-format
     * @param string $dateString
     * @return \DateTimeImmutable|null
     */
    public function validateAndCreateDate($dateString)
    {
        if (!$dateString) {
            return null;
        }

        list($y, $m, $d) = array_pad(explode('-', $dateString, 3), 3, 0);
        $dateIsValid = ctype_digit("$y$m$d") && checkdate($m, $d, $y);

        if (!$dateIsValid) {
            return null;
        } else {
            return new \DateTimeImmutable($dateString);
        }
    }
}
