<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\IngredientRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ApiPostController extends AbstractController
{
   /**
    * @Route("/api/Ingredient", name="api_Ingredient_index", methods={"GET"})
    */
    public function index(IngredientRepository $IngredientRepository, NormalizerInterface $normalizer)
    {
        //se bout de code permet d'aller récupérer le tableau de donnée ingredient
        // transformer des données en tableau =  normalisation

        $Ingredient = $IngredientRepository -> findAll();

        //Tableau associatif en Json
        $IngredientNormalises = $normalizer->normalize($Ingredient, null,['groups' => 'post:read']);
        

       // dans le $json on passe notre tableau $ingredient normalize en json
        $json = json_encode($IngredientNormalises);
        dd($json, $Ingredient);


        $response = newResponse($json, 200, [
            "Content-Type" => "applicarition/json"
        ]);
        return $response;
    }
}
