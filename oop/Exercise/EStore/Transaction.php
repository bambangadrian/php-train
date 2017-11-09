<?php

namespace PhpTrain\Exercise\EStore;

class Transaction
{

    /**
     * Transaction date property.
     *
     * @var string $Date
     */
    private $Date;

    /**
     * Transaction detail data collection property.
     *
     * @var \PhpTrain\Exercise\Estore\Contracts\TransactionItemInterface[] $Details
     */
    private $Details;

    /**
     * Transaction expired date property.
     *
     * @var string $ExpiredDate
     */
    private $ExpiredDate;

    /**
     * Transaction identifier property.
     *
     * @var string $Id
     */
    private $Id;

    /**
     * Transaction owner property.
     *
     * @var \PhpTrain\Exercise\Estore\Contracts\CustomerInterface $Owner
     */
    private $Owner;

    /**
     * Transaction constructor.
     *
     * @param \PhpTrain\Exercise\EStore\Contracts\CustomerInterface          $customer
     * @param \PhpTrain\Exercise\Estore\Contracts\TransactionSourceInterface $source
     * @param                                                                $transactionDate
     */
    public function __construct(
        \PhpTrain\Exercise\EStore\Contracts\CustomerInterface $customer,
        \PhpTrain\Exercise\Estore\Contracts\TransactionSourceInterface $source,
        $transactionDate
    ) {
        $this->Owner = new \PhpTrain\Exercise\Estore\Customer($customer->getId(), $customer->getName());
        $sourceItems = $source->getContents();
        foreach ($sourceItems as $item) {
            $product = new \PhpTrain\Exercise\Estore\Product($item->getItemCode(), $item->getItemName());
            $product->setPrice($item->getItemPrice());
            $product->setStock($item->getItemStock());
            $this->Details[$item->getItemCode()] = new \PhpTrain\Exercise\Estore\CartItemCollection(
                $source,
                $product,
                $item->getItemQuantity()
            );
        }
        $this->Id = 'TRX-' . $source->getSourceId();
        $this->Date = $transactionDate;
        $this->ExpiredDate = '';
    }

    /**
     * @return \PhpTrain\Exercise\Estore\Contracts\FormatterInterface
     */
    public function getData()
    {
        return [
            'Id'     => $this->getId(),
            'Detail' => $this->getDetails(),
            'Total'  => $this->getTotal()
        ];
    }

    /**
     * Get transaction detail data collection property.
     *
     * @return \PhpTrain\Exercise\Estore\Contracts\TransactionItemInterface[]
     */
    public function getDetails()
    {
        return $this->Details;
    }

    /**
     * Get transaction identifier property.
     *
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Get transaction total data.
     *
     * @return float
     */
    public function getTotal()
    {
        $items = $this->Details;
        $result = 0;
        foreach ($items as $item) {
            $result += $item->getItemPrice() * $item->getItemQuantity();
        }
        return $result;
    }
}
