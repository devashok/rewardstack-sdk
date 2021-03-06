<?php

namespace AllDigitalRewards\RewardStack\Transaction;

use AllDigitalRewards\RewardStack\Common\Entity\AbstractEntity;
use AllDigitalRewards\RewardStack\Common\AbstractApirequest;

class TransactionRequest extends AbstractApiRequest
{

    /**
     * @var string
     */
    private $uniqueId;

    /**
     * @var int
     */
    private $page = 1;

    protected $httpMethod = 'GET';

    /**
     * GetParticipantRequest constructor.
     * @param string $uniqueId
     * @param int $page
     */
    public function __construct(string $uniqueId, int $page = 1)
    {
        $this->uniqueId = $uniqueId;
        $this->page = $page;
    }

    public function getHttpEndpoint(): string
    {
        return '/api/user/' . $this->uniqueId. '/transaction' ;
    }

    public function getQueryParams(): string
    {
        return "page=" . $this->page;
    }

    public function getResponseObject(): AbstractEntity
    {
        return new TransactionResponse();
    }

    public function jsonSerialize()
    {
        return [];
    }
}
