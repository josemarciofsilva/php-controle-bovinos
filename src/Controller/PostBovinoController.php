<?php

declare(strict_types=1);

namespace App\Controller;

use App\Application\CreateBovino;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class PostBovinoController extends AbstractController
{
    private CreateBovino $createBovino;

    public function __construct(CreateBovino $createBovino)
    {
        $this->createBovino = $createBovino;
    }

    /**
     * @Route("/bovino", name="app_post_bovino")
     */
    public function handle(Request $request): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            v::key('race', v::stringType()->in([
                'Angus', 'Nelore', 'Brahman', 'Mestiço'
                ])->notEmpty())
                ->key('weight', v::floatType()->notEmpty())
                ->key('dateOfBirth', v::date()->notEmpty())
                ->key('productionOfLitersOfMilkPerWeek', v::intType()->notEmpty())
                ->assert($data);
            $bovino = $this->createBovino->execute($data);
            dd($bovino);
        } catch (NestedValidationException $exception) {
            return new JsonResponse($exception->getMessage(), 422);
        }
        return new JsonResponse($bovino, 201);
    }
}
