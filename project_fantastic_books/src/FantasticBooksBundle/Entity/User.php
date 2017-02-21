<?php
// src/AppBundle/Entity/User.php

namespace FantasticBooksBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    protected $roles;

    public function __construct()
    {
        parent::__construct();
        $this->roles = ['ROLE_USER'];
        // your own logic
    }


}