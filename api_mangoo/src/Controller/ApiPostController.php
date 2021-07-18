<?php

namespace App\Controller;

use App\Entity\Ingredient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\IngredientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\EntityManager;

class ApiPostController extends AbstractController
{
   /**
    * @Route("/api/Ingredient", name="api_Ingredient_index", methods={"GET"})
    */
    public function index(IngredientRepository $IngredientRepository)
    {

        $Ingredient = $IngredientRepository->findAll();
        $response = $this->json($Ingredient, 200, ['groups' => 'post:read']);
        return $response;
        

        //return $this->json($IngredientRepository->findAll(),200, [],['groups' => 'post:read']);

        
        
        //se bout de code permet d'aller récupérer le tableau de donnée ingredient
        // transformer des données en tableau =  normalisation

        

        //Tableau associatif en Json
        // On améliore le code on mettant un Serializer qui va utiliser le normalizer interface

        //$IngredientNormalises = $normalizer->normalize($Ingredient, null,['groups' => 'post:read']);
       // dans le $json on passe notre tableau $ingredient normalize en json
      
 
    
    }
    
    
     /**
    * @Route("/api/Ingredient", name="api_Ingredient_store", methods={"POST"})
    */

    public function store(Request $request, SerializerInterface $serializer, EntityManagerInterface $em ){

        // Ceci fonction très bien 
        /*
         $jsonReceive = $request-> getContent();
        dd($jsonReceive);
        */
        $jsonRecu = $request-> getContent();
       
        try {
            $Ingredient = $serializer->deserialize($jsonRecu, Ingredient::class, 'json');
            $em -> persist($Ingredient);
            $em-> flush();
            return $this->json($Ingredient,201,['groups' => 'post:read']);
        } catch (NotEncodableValueException $e){

        return $this->json([
            'status' => 400,
            'message' => $e->getMessage() 
        ], 400);
    }
    }
}
