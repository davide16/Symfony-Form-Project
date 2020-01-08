<?php
// src/AppBundle/Entity/InvoiceRows.php
namespace AppBundle\Entity;

use AppBundle\Entity\Invoice;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\Table;
#create istance of Invoice to create foreign key, to connect invoice Id of this entity to Id of entity Invoice
$invoice1_id = new Invoice();
/**
 * @ORM\Entity

 */
class InvoiceRows
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**

     * @ORM\OneToOne(
     *     targetEntity="AppBundle\Entity\Invoice"
     * )
     */

    private $invoice_id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Type(type="integer")
     * @Assert\GreaterThan(0)
     */
    private $quantity;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     * @Assert\NotBlank
     * @Assert\GreaterThan(0)
     */
    private $amount;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     * @Assert\NotBlank
     * @Assert\GreaterThan(0)
     */
    private $VATamount;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     * @Assert\NotBlank
     * @Assert\GreaterThan(0)
     */
    private $total_with_VAT;
    // other properties and methods

    public function getid()
    {
        return $this->id;
    }

    public function getInvoiceId()
    {
        return $this->invoice_id;
    }


    public function setInvoiceId($invoice1_id)
    {
        $this->invoice_id = $invoice1_id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getVATamount()
    {
        return $this->VATamount;
    }

    public function setVATamount($VATamount)
    {
        $this->VATamount = $VATamount;
    }

    public function getTotalWithVAT()
    {
        return $this->total_with_VAT;
    }

    public function setTotalWithVAT($total_with_VAT)
    {
        $this->total_with_VAT = $total_with_VAT;
    }


}
