<?php
namespace Archmage\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Payum\Core\Model\ArrayObject;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class PaymentDetails extends ArrayObject
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var integer $id
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="runes", type="smallint", nullable=false)
     */
    private $runes = 0;

    /**
     * Set runes
     *
     * @param integer $runes
     * @return PaymentDetails
     */
    public function setRunes($runes)
    {
        $this->runes = $runes;

        return $this;
    }

    /**
     * Get runes
     *
     * @return integer 
     */
    public function getRunes()
    {
        return $this->runes;
    }
}
