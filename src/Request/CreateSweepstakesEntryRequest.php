<?php

namespace AllDigitalRewards\RewardStack\Request;

use AllDigitalRewards\RewardStack\Common\Entity\AbstractEntity;
use AllDigitalRewards\RewardStack\Response\ParticipantResponse;

class CreateSweepstakesEntryRequest extends AbstractApiRequest
{
    /**
     * @var string
     */
    private $uniqueId;

    private $entryCount;

    protected $httpMethod = 'POST';

    /**
     * GetParticipantRequest constructor.
     * @param string $uniqueId
     */
    public function __construct(string $uniqueId, int $entryCount)
    {
        $this->uniqueId = trim($uniqueId);
        $this->entryCount = $entryCount;
    }

    public function getHttpEndpoint(): string
    {
        return '/api/user/' . $this->uniqueId . '/sweepstake';
    }

    public function getResponseObject(): AbstractEntity
    {
        return new ParticipantResponse();
    }

    public function jsonSerialize()
    {
        return [
            "entryCount" => $this->entryCount
        ];
    }
}