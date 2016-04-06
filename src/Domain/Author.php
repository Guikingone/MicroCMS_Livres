<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 04/04/2016
 * Time: 09:19
 */

namespace MicroCMS\Domain;

class Author
{
    /**
     * @var integer
     */
    private $auth_id;

    /**
     * @var string
     */
    private $auth_first_name;

    /**
     * @var string
     */
    private $auth_last_name;

    /**
     * Associated book
     *
     * @var \MicroCMS\Domain\Livre
     */
    private $livre;

    public function setAuthId($auth_id)
    {
        $this->auth_id = $auth_id;
    }

    public function getAuthId()
    {
        return $this->auth_id;
    }

    public function setAuthFirstName($auth_first_name)
    {
        $this->auth_first_name = $auth_first_name;
    }

    public function getAuthFirstName()
    {
        return $this->auth_first_name;
    }

    public function setAuthLastName($auth_last_name)
    {
        $this->auth_last_name = $auth_last_name;
    }

    public function getAuthLastName()
    {
        return $this->auth_last_name;
    }

    public function getLivre()
    {
        return $this->livre;
    }

    public function setLivre(Livre $livre) {
        $this->$livre = $livre;
    }
}