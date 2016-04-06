<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 02/04/2016
 * Time: 09:04
 */

namespace MicroCMS\DAO;

use MicroCMS\Domain\Livre;

class LivreDAO extends DAO
{
    /**
     * Return a list of all books, sorted by date (most recent first).
     *
     * @return array A list of all books.
     */
    public function findAll()
    {
        $sql = "select * from book order by book_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $livres = array();
        foreach ($result as $row) {
            $livreId = $row['book_id'];
            $livres[$livreId] = $this->buildDomainObject($row);
        }
        return $livres;
    }

    /**
     * Creates an Livre object based on a DB row.
     *
     * @param array $row The DB row containing Livre data.
     * @return \MicroCMS\Domain\Livre
     */
    protected function buildDomainObject($row)
    {
        $livre = new Livre();
        $livre->setBookId($row['book_id']);
        $livre->setBookTitle($row['book_title']);
        $livre->setBookSummary($row['book_summary']);
        $livre->setBookIsbn($row['book_isbn']);
        $livre->setAuthId($row['auth_id']);
        return $livre;
    }

    /**
     * Returns an book matching the supplied id.
     *
     * @param integer $id
     *
     * @return \MicroCMS\Domain\livre|throws an exception if no matching book is found
     */
    public function find($id)
    {
        $sql = "select * from book where book_id = ?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No book matching id " . $id);
    }
}