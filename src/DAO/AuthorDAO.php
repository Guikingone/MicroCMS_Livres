<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 04/04/2016
 * Time: 10:46
 */

namespace MicroCMS\DAO;

use MicroCMS\Domain\Author;

class AuthorDAO extends DAO
{
    /**
     * @var \MicroCMS\DAO\LivreDAO
     */
    private $livreDAO;

    public function setLivreDAO(LivreDAO $livreDAO)
    {
        $this->livreDAO = $livreDAO;
    }

    /**
     * Return the name of book author
     *
     * @param integer $livreId The book id.
     *
     * @return array The author for the book.
     */
    public function findAllByLivre($livreId)
    {
        // The associated book is retrieved only once
        $livre = $this->livreDAO->find($livreId);

        // auth_id is not selected by the SQL query
        // The book won't be retrieved during domain objet construction
        $sql = "select auth_id, auth_first_name, auth_last_name from author where auth_id = ?";
        $result = $this->getDb()->fetchAll($sql, array($livreId));
        return $result;
    }

    /**
     * Creates an Author object based on a DB row.
     *
     * @param array $row The DB row containing Author data.
     * @return \MicroCMS\Domain\Author
     */
    protected function buildDomainObject($row)
    {
        $author = new Author();
        $author->setAuthId($row['auth_id']);
        $author->setAuthFirstName($row['auth_first_name']);
        $author->setAuthLastName($row['auth_last_name']);

        if (array_key_exists('book_id', $row)) {
            // Find and set the associated book
            $livreId = $row['book_id'];
            $livre = $this->livreDAO->find(livreId);
            $author->setLivre($livre);
        }

        return $author;
    }
}