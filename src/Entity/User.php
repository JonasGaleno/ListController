<?php

namespace Jonas\ListController\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class User
{
    #[Column, Id, GeneratedValue]
    public int $id;

    #[OneToMany(targetEntity: Category::class, mappedBy: 'user', cascade: ['persist', 'remove'])]
    private Collection $categories;

    public function __construct(
        #[Column]
        public string $name,
        #[Column]
        public string $email,
        #[Column]
        public string $password
    )
    {
        $this->categories = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function addCategory(Category $category): void
    {
        $this->categories->add($category);
        $category->setUser($this);
    }  

    public function verifyPassword(string $cleanPassword): bool
    {
        return password_verify($cleanPassword, $this->password);
    }
}
