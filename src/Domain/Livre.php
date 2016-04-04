<?php

namespace MicroCMS\Domain;

class Livre
{
    /**
     * @var integer
     */
    private $book_id;

    /**
     * @var string
     */
    private $book_title;

    /**
     * @var string
     */
    private $book_isbn;

    /**
     * @var string
     */
    private $book_summary;

    /**
     * @var string
     */
    private $auth_id;

    public function getBookId()
    {
        return $this->book_id;
    }

    public function setBookId($book_id)
    {
        $this->book_id = $book_id;
    }

    public function getBookTitle()
    {
        return $this->book_title;
    }

    public function setBookTitle($book_title)
    {
        $this->book_title = $book_title;
    }

    public function getBookIsbn()
    {
        return $this->book_isbn;
    }

    public function setBookIsbn($book_isbn)
    {
        $this->book_isbn = $book_isbn;
    }

    public function getBookSummary()
    {
        return $this->book_summary;
    }

    public function setBookSummary($book_summary)
    {
        $this->book_summary = $book_summary;
    }

    public function getAuthId()
    {
        return $this->auth_id;
    }

    public function setAuthId($auth_id)
    {
        $this->auth_id = $auth_id;
    }
}