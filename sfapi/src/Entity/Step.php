<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Enum\PuzzleTypeEnum;
use App\Repository\StepRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StepRepository::class)]
#[ApiResource]
class Step
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(enumType: PuzzleTypeEnum::class)]
    private ?PuzzleTypeEnum $type = null;

    #[ORM\Column(length: 255)]
    private ?string $reward = null;

    #[ORM\Column]
    private array $story = [];

    #[ORM\Column]
    private array $activity = [];

    #[ORM\Column]
    private array $success = [];

    #[ORM\Column]
    private array $failure = [];

    #[ORM\ManyToOne(inversedBy: 'steps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Course $course = null;

    #[ORM\ManyToOne(inversedBy: 'steps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Room $room = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): ?PuzzleTypeEnum
    {
        return $this->type;
    }

    public function setType(PuzzleTypeEnum $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getReward(): ?string
    {
        return $this->reward;
    }

    public function setReward(string $reward): static
    {
        $this->reward = $reward;

        return $this;
    }

    public function getStory(): array
    {
        return $this->story;
    }

    public function setStory(array $story): static
    {
        $this->story = $story;

        return $this;
    }

    public function getActivity(): array
    {
        return $this->activity;
    }

    public function setActivity(array $activity): static
    {
        $this->activity = $activity;

        return $this;
    }

    public function getSuccess(): array
    {
        return $this->success;
    }

    public function setSuccess(array $success): static
    {
        $this->success = $success;

        return $this;
    }

    public function getFailure(): array
    {
        return $this->failure;
    }

    public function setFailure(array $failure): static
    {
        $this->failure = $failure;

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): static
    {
        $this->course = $course;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): static
    {
        $this->room = $room;

        return $this;
    }
}
