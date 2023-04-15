<?php

declare(strict_types=1);

namespace App\Controller;

use App\Application\CreateBovino;
use PHPUnit\Framework\TestCase;
use Respect\Validation\Exceptions\NestedValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PostBovinoControllerTest extends TestCase
{
    private CreateBovino $createBovinoMock;
    private PostBovinoController $instance;

    public function setUp(): void
    {
        $this->createBovinoMock = $this->createMock(CreateBovino::class);
        $this->instance = new PostBovinoController($this->createBovinoMock);
    }

    public function testPostBovinoControllerWithInvalidDataThrowException(): void
    {
        $payload = array_merge($this->validRequestPayload(), [
            'race' => ''
        ]);

        $requestMock = $this->createMock(Request::class);
        $requestMock
            ->method('getContent')
            ->willReturn(json_encode($payload));

        $actual = $this->instance->handle($requestMock);

        $expectedMessage = '"These rules must pass for `{ \u0022race\u0022: \u0022\u0022,' .
            ' \u0022weight\u0022: 120.32, \u0022dateOfBirth\u0022: \u00222023-04-15\u0022,' .
            ' \u0022productionOfLitersOfMilkPerWeek\u0022: 49 }`"';

        $this->assertInstanceOf(JsonResponse::class, $actual);
        $this->assertEquals(422, $actual->getStatusCode());
        $this->assertEquals($expectedMessage, $actual->getContent());
    }

    public function testPostBovinoControllerWithValidDataShouldWork(): void
    {
        $requestPayload = $this->validRequestPayload();
        $reponsePayload = $this->validResponsePayload();
        $requestMock = $this->createMock(Request::class);
        $requestMock
            ->method('getContent')
            ->willReturn(json_encode($requestPayload));

        $this->createBovinoMock
            ->method('execute')
            ->with($requestPayload)
            ->willReturn($reponsePayload);

        $actual = $this->instance->handle($requestMock);

        $expectedMessage = json_encode($reponsePayload);

        $this->assertInstanceOf(JsonResponse::class, $actual);
        $this->assertEquals(201, $actual->getStatusCode());
        $this->assertEquals($expectedMessage, $actual->getContent());
    }
    private function validRequestPayload(): array
    {
        return [
            'race' => 'Nelore',
            'weight' => 120.32,
            'dateOfBirth' => '2023-04-15',
            'productionOfLitersOfMilkPerWeek' => 49
        ];
    }

    private function validResponsePayload(): array
    {
        return [
            'race' => 'Nelore',
            'weight' => 120.32,
            'dateOfBirth' => '2023-04-15',
            'productionOfLitersOfMilkPerWeek' => 49
        ];
    }
}