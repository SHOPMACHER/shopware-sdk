<?php

namespace LeadCommerce\Shopware\SDK\Entity;

/**
 * Class Order
 * @package LeadCommerce\Shopware\SDK\Entity
 */
class Order extends Base
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $number;
    /**
     * @var int
     */
    protected $customerId;
    /**
     * @var int
     */
    protected $paymentId;
    /**
     * @var int
     */
    protected $dispatchId;
    /**
     * @var int
     */
    protected $partnerId;
    /**
     * @var int
     */
    protected $shopId;
    /**
     * @var int
     */
    protected $invoiceAmount;
    /**
     * @var int
     */
    protected $invoiceAmountNet;
    /**
     * @var int
     */
    protected $invoiceShipping;
    /**
     * @var int
     */
    protected $invoiceShippingNet;
    /**
     * @var string
     */
    protected $orderTime;
    /**
     * @var int
     */
    protected $transactionId;
    /**
     * @var string
     */
    protected $comment;
    /**
     * @var string
     */
    protected $customerComment;
    /**
     * @var string
     */
    protected $internalComment;
    /**
     * @var int
     */
    protected $net;
    /**
     * @var int
     */
    protected $taxFree;
    /**
     * @var int
     */
    protected $temporaryId;
    /**
     * @var int
     */
    protected $referer;
    /**
     * @var string
     */
    protected $clearedDate;
    /**
     * @var string
     */
    protected $trackingCode;
    /**
     * @var string
     */
    protected $languageIso;
    /**
     * @var string
     */
    protected $currency;
    /**
     * @var int
     */
    protected $currencyFactor;
    /**
     * @var string
     */
    protected $remoteAddress;
    /**
     * @var int
     */
    protected $paymentStatusId;
    /**
     * @var int
     */
    protected $orderStatusId;
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     *
     * @return Order
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }
    
    /**
     * @param string $number
     *
     * @return Order
     */
    public function setNumber($number)
    {
        $this->number = $number;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }
    
    /**
     * @param int $customerId
     *
     * @return Order
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }
    
    /**
     * @param int $paymentId
     *
     * @return Order
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getDispatchId()
    {
        return $this->dispatchId;
    }
    
    /**
     * @param int $dispatchId
     *
     * @return Order
     */
    public function setDispatchId($dispatchId)
    {
        $this->dispatchId = $dispatchId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getPartnerId()
    {
        return $this->partnerId;
    }
    
    /**
     * @param int $partnerId
     *
     * @return Order
     */
    public function setPartnerId($partnerId)
    {
        $this->partnerId = $partnerId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getShopId()
    {
        return $this->shopId;
    }
    
    /**
     * @param int $shopId
     *
     * @return Order
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getInvoiceAmount()
    {
        return $this->invoiceAmount;
    }
    
    /**
     * @param int $invoiceAmount
     *
     * @return Order
     */
    public function setInvoiceAmount($invoiceAmount)
    {
        $this->invoiceAmount = $invoiceAmount;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getInvoiceAmountNet()
    {
        return $this->invoiceAmountNet;
    }
    
    /**
     * @param int $invoiceAmountNet
     *
     * @return Order
     */
    public function setInvoiceAmountNet($invoiceAmountNet)
    {
        $this->invoiceAmountNet = $invoiceAmountNet;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getInvoiceShipping()
    {
        return $this->invoiceShipping;
    }
    
    /**
     * @param int $invoiceShipping
     *
     * @return Order
     */
    public function setInvoiceShipping($invoiceShipping)
    {
        $this->invoiceShipping = $invoiceShipping;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getInvoiceShippingNet()
    {
        return $this->invoiceShippingNet;
    }
    
    /**
     * @param int $invoiceShippingNet
     *
     * @return Order
     */
    public function setInvoiceShippingNet($invoiceShippingNet)
    {
        $this->invoiceShippingNet = $invoiceShippingNet;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getOrderTime()
    {
        return $this->orderTime;
    }
    
    /**
     * @param string $orderTime
     *
     * @return Order
     */
    public function setOrderTime($orderTime)
    {
        $this->orderTime = $orderTime;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }
    
    /**
     * @param int $transactionId
     *
     * @return Order
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
    
    /**
     * @param string $comment
     *
     * @return Order
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerComment()
    {
        return $this->customerComment;
    }
    
    /**
     * @param string $customerComment
     *
     * @return Order
     */
    public function setCustomerComment($customerComment)
    {
        $this->customerComment = $customerComment;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getInternalComment()
    {
        return $this->internalComment;
    }
    
    /**
     * @param string $internalComment
     *
     * @return Order
     */
    public function setInternalComment($internalComment)
    {
        $this->internalComment = $internalComment;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getNet()
    {
        return $this->net;
    }
    
    /**
     * @param int $net
     *
     * @return Order
     */
    public function setNet($net)
    {
        $this->net = $net;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTaxFree()
    {
        return $this->taxFree;
    }
    
    /**
     * @param int $taxFree
     *
     * @return Order
     */
    public function setTaxFree($taxFree)
    {
        $this->taxFree = $taxFree;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTemporaryId()
    {
        return $this->temporaryId;
    }
    
    /**
     * @param int $temporaryId
     *
     * @return Order
     */
    public function setTemporaryId($temporaryId)
    {
        $this->temporaryId = $temporaryId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getReferer()
    {
        return $this->referer;
    }
    
    /**
     * @param int $referer
     *
     * @return Order
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getClearedDate()
    {
        return $this->clearedDate;
    }
    
    /**
     * @param string $clearedDate
     *
     * @return Order
     */
    public function setClearedDate($clearedDate)
    {
        $this->clearedDate = $clearedDate;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTrackingCode()
    {
        return $this->trackingCode;
    }
    
    /**
     * @param string $trackingCode
     *
     * @return Order
     */
    public function setTrackingCode($trackingCode)
    {
        $this->trackingCode = $trackingCode;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLanguageIso()
    {
        return $this->languageIso;
    }
    
    /**
     * @param string $languageIso
     *
     * @return Order
     */
    public function setLanguageIso($languageIso)
    {
        $this->languageIso = $languageIso;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
    
    /**
     * @param string $currency
     *
     * @return Order
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCurrencyFactor()
    {
        return $this->currencyFactor;
    }
    
    /**
     * @param int $currencyFactor
     *
     * @return Order
     */
    public function setCurrencyFactor($currencyFactor)
    {
        $this->currencyFactor = $currencyFactor;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getRemoteAddress()
    {
        return $this->remoteAddress;
    }
    
    /**
     * @param string $remoteAddress
     *
     * @return Order
     */
    public function setRemoteAddress($remoteAddress)
    {
        $this->remoteAddress = $remoteAddress;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getPaymentStatusId()
    {
        return $this->paymentStatusId;
    }
    
    /**
     * @param int $paymentStatusId
     *
     * @return Order
     */
    public function setPaymentStatusId($paymentStatusId)
    {
        $this->paymentStatusId = $paymentStatusId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getOrderStatusId()
    {
        return $this->orderStatusId;
    }
    
    /**
     * @param int $orderStatusId
     *
     * @return Order
     */
    public function setOrderStatusId($orderStatusId)
    {
        $this->orderStatusId = $orderStatusId;
        
        return $this;
    }
}
