<?php

namespace AllDigitalRewards\Tests;

use AllDigitalRewards\RewardStack\Auth\AuthProxy;
use AllDigitalRewards\RewardStack;
use AllDigitalRewards\RewardStack\Program\ProgramListResponse;
use \AllDigitalRewards\RewardStack\Program;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ProgramListResponseTest extends TestCase
{
    public function testRequest()
    {
        $jsonData = file_get_contents(__DIR__ . "/../fixtures/program_list_response.json");

        $uri = new \GuzzleHttp\Psr7\Uri('http://localhost');

        $authProxy = $this->createMock(AuthProxy::class);

        $authProxy->method('getUri')
            ->willReturn($uri);

        $authProxy->method('request')
            ->willReturn(new Response(
                200,
                [],
                $jsonData
            ));

        $client = new RewardStack\Client($authProxy);

        $progromListRequest = new Program\ProgramListRequest('sharecare');
        $response = $client->request($progromListRequest);

        $expectedResponse = new ProgramListResponse(json_decode($jsonData));

        $this->assertInstanceOf(
            ProgramListResponse::class,
            $response
        );

        $this->assertEquals(
            $expectedResponse->getUniqueId(),
            $response->getUniqueId()
        );

        $this->assertEquals(
            $expectedResponse->getMeta(),
            $response->getMeta()
        );

        $this->assertEquals(
            $expectedResponse->getName(),
            $response->getName()
        );

        $this->assertEquals(
            $expectedResponse->getPoint(),
            $response->getPoint()
        );

        $this->assertEquals(
            $expectedResponse->getUrl(),
            $response->getUrl()
        );

        $this->assertEquals(
            $expectedResponse->getLogo(),
            $response->getLogo()
        );

        $this->assertEquals(
            $expectedResponse->getPublished(),
            $response->getPublished()
        );

        $this->assertEquals(
            $expectedResponse->getCostCenterId(),
            $response->getCostCenterId()
        );

        $this->assertEquals(
            $expectedResponse->getActive(),
            $response->getActive()
        );$this->assertEquals(
            $expectedResponse->getLogo(),
            $response->getLogo()
        );

        $this->assertEquals(
            $expectedResponse->getCreatedAt(),
            $response->getCreatedAt()
        );

        $this->assertEquals(
            $expectedResponse->getUpdatedAt(),
            $response->getUpdatedAt()
        );

        $this->assertEquals(
            $expectedResponse->getOrganization(),
            $response->getOrganization()
        );

        $this->assertEquals(
            $expectedResponse->getContact(),
            $response->getContact()
        );
        $this->assertEquals(
            $expectedResponse->getProductCriteria(),
            $response->getProductCriteria()
        );
        $this->assertEquals(
            $expectedResponse->getFeaturedProducts(),
            $response->getFeaturedProducts()
        );

        $this->assertEquals(
            $expectedResponse->getAutoRedemption(),
            $response->getAutoRedemption()
        );
    }
}
