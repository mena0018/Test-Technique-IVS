<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BuildingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BuildingRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => [
                'groups' => ['read:Building:collection'],
                'openapi_definition_name' => 'Collection'
            ],
            'pagination_enabled' => true,
            "openapi_context" => [
                'summary' => 'Accès à tous les buildings',
                'description' => 'La route permet de retourner tous les nom et code postal\'s des buildings',
                'responses' => [
                    '200' => [
                        'description' => 'Succès, les buildings sont retournées'
                    ]
                ]
            ]
        ]
    ],
    itemOperations: [
        'get' => [
            'normalization_context' =>  [
                'groups' => ['read:Building:collection'],
                'openapi_definition_name' => 'Detail'
            ],
            "openapi_context" => [
                'summary' => 'Accès à un building',
                'description' => 'La route permet de retourner les informations d\'un building spécifier par son id',
                'responses' => [
                    '200' => [
                        'description' => 'Succès, le nom et le code postal du building sont retournée'
                    ],
                    '404' => [
                        'description' => 'Building introuvable'
                    ]
                ]
            ]
        ]
    ],
    normalizationContext:   ['groups' => ['read:Building:collection']],
)]
class Building
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:Building:collection'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:Building:collection'])]
    private $nom;

    #[ORM\Column(type: 'string')]
    #[Groups(['read:Building:collection'])]
    private $zipcode;

    #[ORM\OneToMany(mappedBy: 'building', targetEntity: Piece::class)]
    #[Groups(['read:Building:collection'])]
    private $pieces;

    public function __construct()
    {
        $this->pieces = new ArrayCollection();
    }

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

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * @return Collection<int, Piece>
     */
    public function getPieces(): Collection
    {
        return $this->pieces;
    }

    public function addPiece(Piece $piece): self
    {
        if (!$this->pieces->contains($piece)) {
            $this->pieces[] = $piece;
            $piece->setBuilding($this);
        }

        return $this;
    }

    public function removePiece(Piece $piece): self
    {
        if ($this->pieces->removeElement($piece)) {
            // set the owning side to null (unless already changed)
            if ($piece->getBuilding() === $this) {
                $piece->setBuilding(null);
            }
        }

        return $this;
    }
}
