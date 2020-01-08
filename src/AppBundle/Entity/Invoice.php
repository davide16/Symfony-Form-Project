<?php
// src/AppBundle/Entity/Invoice.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @UniqueEntity(fields="invoice_num", message="Invoice number already taken")
 */
class Invoice
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     * @Assert\Date
     */
    private $invoice_date;

    /**
     * @ORM\Column(type="integer", unique=true)
     * @Assert\NotBlank
     * @Assert\Type(type="integer")
     * @Assert\GreaterThan(0)
     */
    private $invoice_num;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Type(type="integer")
     * @Assert\GreaterThan(0)
     */
    private $id_client;

    // other properties and methods

    public function getid()
    {
        return $this->id;
    }

    public function getInvoiceDate()
    {
        return $this->invoice_date;
    }

    public function setInvoiceDate($invoice_date)
    {
        $this->invoice_date = $invoice_date;
    }

    public function getInvoiceNum()
    {
        return $this->invoice_num;
    }

    public function setInvoiceNum($invoice_num)
    {
        $this->invoice_num = $invoice_num;
    }

    public function getIdClient()
    {
        return $this->id_client;
    }

    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
    }

    public function __toString()
    {
        return (string)$this->id;
    }



}
