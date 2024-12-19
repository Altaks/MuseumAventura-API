<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Enum\DifficultyEnum;
use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            normalizationContext: ['groups' => ['course:readAll']]
        ),
        new Get(
            normalizationContext: ['groups' => ['course:readOne']]
        )
    ]
)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['course:readAll', 'course:readOne'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['course:readAll', 'course:readOne'])]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['course:readAll', 'course:readOne'])]
    private ?string $description = null;
    #[ORM\Column(length: 255)]
    #[Groups(['course:readAll', 'course:readOne'])]
    private ?string $thumbnail = null;
    #[ORM\Column(enumType: DifficultyEnum::class)]
    #[Groups(['course:readAll', 'course:readOne'])]
    private ?DifficultyEnum $difficulty = null;
    /**
     * @var Collection<int, Step>
     */
    #[ORM\OneToMany(targetEntity: Step::class, mappedBy: 'course', orphanRemoval: true)]
    #[Groups(['course:readAll', 'course:readOne'])]
    private Collection $steps;

    #[ORM\Column(length: 255)]
    #[Groups(['course:readAll', 'course:readOne'])]
    private ?string $reward = null;

    #[ORM\Column]
    #[Groups(['course:readAll', 'course:readOne'])]
    private ?int $duration = null;

    public function __construct()
    {
        $this->steps = new ArrayCollection();
    }

//    #[Groups('course:readAll')]
//    #[SerializedName('description')]
//    public function getShortenedDescription(): string
//    {
//        return substr($this->description, 0, 97) . '...';
//    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): static
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getDifficulty(): ?DifficultyEnum
    {
        return $this->difficulty;
    }

    public function setDifficulty(DifficultyEnum $difficulty): static
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * @return Collection<int, Step>
     */
    public function getSteps(): Collection
    {
        return $this->steps;
    }

    public function addStep(Step $step): static
    {
        if (!$this->steps->contains($step)) {
            $this->steps->add($step);
            $step->setCourse($this);
        }

        return $this;
    }

    public function removeStep(Step $step): static
    {
        if ($this->steps->removeElement($step)) {
            // set the owning side to null (unless already changed)
            if ($step->getCourse() === $this) {
                $step->setCourse(null);
            }
        }

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

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }
}
