<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PieceRepository;
use Doctrine\ORM\Mapping as ORM;

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
                'description' => 'La route permet de retourner les nom des pièces, le nombre de personnes par pièces ainsi que leur building',
                'responses' => [
                    '200' => [
                        'description' => 'Succès, les pièces sont retournées'
                    ]
                ]
            ]
        ]
    ]
)]
class Piece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string')]
    private $nbPers;

    #[ORM\ManyToOne(targetEntity: Building::class, inversedBy: 'pieces')]
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
