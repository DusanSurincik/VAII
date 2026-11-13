<?php

namespace App\Models;

use Framework\Core\Model;

class Category extends Model
{
    protected ?int $id = null;
    protected ?string $name = null;
    protected ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Vráti všetky podujatia patriace do tejto kategórie.
     * @return Event[]
     */
    public function getEvents(): array
    {
        if (!$this->id) {
            return [];
        }
        return Event::getAll('category_id = ?', [$this->id]);
    }
}