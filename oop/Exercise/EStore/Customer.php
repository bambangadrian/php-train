<?php
/**
 * Code written is strictly used within this program.
 * Any other use of this code is in violation of copy rights.
 *
 * @package   PhpTrain
 * @author    Muhamad Faisal Setiyawan <setyawan@invosa.com>
 * @copyright 2016 Developer
 * @license   - No License
 * @version   GIT: $Id$
 * @link      -
 */

namespace PhpTrain\Exercise\EStore;

/**
 * Customer class description.
 *
 * @package    PhpTrain
 * @subpackage Exercise\EStore
 * @author     Muhamad Faisal Setiyawan <setyawan@invosa.com>
 */
class Customer
{
    /**
     * Customer identifier property.
     *
     * @var string $Id
     */
    private $Id;

    /**
     * Customer name property.
     *
     * @var string $Name
     */
    private $Name;

    /**
     * Customer address property.
     *
     * @var string $Address
     */
    private $Address;

    /**
     * Customer email property.
     *
     * @var string $Email
     */
    private $Email;

    /**
     * Customer constructor.
     */
    public function __construct($code, $name, $address, $email)
    {
        $this->setId($code);
        $this->setName($name);
        $this->setAddress($address);
        $this->setEmail($email);
    }

    /**
     * Get customer identifier.
     *
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Get Customer name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Get customer address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * Get customer Email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @param string $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @param string $Address
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    /**
     * @param string $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }
}
