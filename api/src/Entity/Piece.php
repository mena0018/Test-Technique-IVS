<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\PieceCountController;
use App\Repository\PieceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PieceRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => [
                'groups' => ['read:Piece:collection'],
                'openapi_definition_name' => 'Collection'
            ],
            'pagination_enabled' => true,
            "openapi_context" => [
                'summary' => 'Accès à toutes les pièces',
                'description' => 'La route permet de retourner les noms des pièces, le nombre de personnes par
                                  pièce ainsi que leur building',
                'responses' => [
                    '200' => [
                        'description' => 'Succès, les pièces sont retournées'
                    ]
                ]
            ]
        ],
        'post' => [
            "openapi_context" => [
                'summary' => 'Ajout de pièces',
                'description' => 'La route permet d\'ajouter une pièce. Pour cela veuillez spécifier un nom,
                                  un nombre de personnes par pièce et le building associé',
                'responses' => [
                    '201' => [
                        'description' => 'La pièce à été ajoutée avec succès'
                    ],
                    '400' => [
                        'description' => 'Saisie incorrecte'
                    ],
                    '422' => [
                        'description' => 'Entité non traitable'
                    ]
                ]
            ]
        ],
    ],
    itemOperations: [
        'get' => [
            'normalization_context' => [
                'groups' => ['read:Piece:collection', 'read:Piece:item'],
                'openapi_definition_name' => 'Detail'
            ],
            "openapi_context" => [
                'summary' => 'Accès à une pièce',
                'description' => 'La route permet de retourner les informations d\'une pièce spécifier par son id',
                'responses' => [
                    '200' => [
                        'description' => 'Succès, le nom de la pièce, son nombre de personnes ainsi que son 
                                          building sont retournée'
                    ],
                    '404' => [
                        'description' => 'Pièce introuvable'
                    ]
                ]
            ]
        ],
        'countNbPers' => [
            'method' => 'GET',
            'path' => '/pieces/{id}/countNbPers',
            'controller' => PieceCountController::class,
            'filters' => [],
            'pagination_enabled' => false,
            'openapi_context' => [
                'summary' => 'Récupère le nombre de personnes au total dans une pièce',
                'description' => 'La route permet de compter le nombre total de personnes dans une pièce 
                                  et renvoie le résultat sous la forme d\'un entier au  format JSON',
                'responses' => [
                    '200' => [
                        'description' => 'Nombre total de personnes retourné avec succès',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    'type' => 'int',
                                    'example' => 5
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    normalizationContext: ['groups' => ['read:Piece:collection']],
)]
class Piece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups([
        'read:Piece:collection',
        'read:Piece:item',
        'read:Building:collection',
        'read:Building:item'
    ])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups([
        'read:Piece:collection',
        'read:Piece:item',
        'read:Building:collection',
        'read:Building:item'
    ])]
    private $nom;

    #[ORM\Column(type: 'string')]
    #[Groups([
        'read:Piece:collection',
        'read:Piece:item',
        'read:Building:collection',
        'read:Building:item'
    ])]
    private $nbPers;

    #[ORM\ManyToOne(targetEntity: Building::class, inversedBy: 'pieces')]
    #[Groups(['read:Piece:item'])]
    private $building;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNbPers(): ?string
    {
        return $this->nbPers;
    }

    public function setNbPers(string $nbPers): self
    {
        $this->nbPers = $nbPers;

        return $this;
    }

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): self
    {
        $this->building = $building;

        return $this;
    }
}
