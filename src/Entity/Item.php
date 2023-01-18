<?php

namespace Jonas\ListController\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Item
{
    #[Column, Id, GeneratedValue]
    public int $id;

    #[Column]
    public string $status;

    #[ManyToOne(targetEntity: Category::class, inversedBy: 'items')]
    public Category $category;

    public function __construct(
        #[Column]
        public string $description,
    )
    {
        $this->status = 'PENDENTE';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
