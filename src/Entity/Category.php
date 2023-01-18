<?php

namespace Jonas\ListController\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Category
{
    #[Column, Id, GeneratedValue]
    public int $id;

    #[ManyToOne(targetEntity: User::class, inversedBy: 'categories')]
    public User $user;

    #[OneToMany(targetEntity: Item::class, mappedBy: 'category', cascade: ['persist', 'remove'])]
    private Collection $items;

    public function __construct(
        #[Column]
        public string $name
    )
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addItem(Item $item): void
    {
        $this->items->add($item);
        $item->setCategory($this);
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
