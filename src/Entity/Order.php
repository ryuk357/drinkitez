<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Party::class, inversedBy="orders")
     */
    private $party;

    /**
     * @ORM\ManyToMany(targetEntity=Guest::class, inversedBy="orders")
     */
    private $guests;

    public function __construct()
    {
        $this->guests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParty(): ?party
    {
        return $this->party;
    }

    public function setParty(?party $party): self
    {
        $this->party = $party;

        return $this;
    }

    /**
     * @return Collection<int, guest>
     */
    public function getGuests(): Collection
    {
        return $this->guests;
    }

    public function addGuest(Guest $guest): self
    {
        if (!$this->guests->contains($guest)) {
            $this->guests[] = $guest;
        }

        return $this;
    }

    public function removeGuest(Guest $guest): self
    {
        $this->guests->removeElement($guest);

        return $this;
    }
}
