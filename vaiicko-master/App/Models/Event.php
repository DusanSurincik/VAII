<?php

namespace App\Models;

use Framework\Core\Model;

class Event extends Model
{
    protected ?int $id = null;
    protected ?string $title = null;
    protected ?string $description = null;
    protected ?string $date = null;
    protected ?string $location = null;
    protected ?float $price = null;
    protected ?string $image = null;
    protected ?int $category_id = null;

    public static function getTableName(): string
    {
        return 'events';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    public function getPrice(): ?float
    {
        return $this->price !== null ? (float)$this->price : null;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setCategoryId(?int $category_id): void
    {
        $this->category_id = $category_id;
    }

    public function getCategory(): ?Category
    {
        return $this->category_id ? Category::getOne($this->category_id) : null;
    }
}