<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BestelregelRepository")
 */
class Bestelregel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $aantal;

    /**
     * @ORM\Column(type="date")
     */
    private $afleverdatum;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ijsrecept", inversedBy="Bestelregel")
     */
    private $Ijsrecept;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="Bestelregel")
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAantal(): ?int
    {
        return $this->aantal;
    }

    public function setAantal(int $aantal): self
    {
        $this->aantal = $aantal;

        return $this;
    }

    public function getAfleverdatum(): ?\DateTimeInterface
    {
        return $this->afleverdatum;
    }

    public function setAfleverdatum(\DateTimeInterface $afleverdatum): self
    {
        $this->afleverdatum = $afleverdatum;

        return $this;
    }

    public function getIjsrecept(): ?Ijsrecept
    {
        return $this->Ijsrecept;
    }

    public function setIjsrecept(?Ijsrecept $Ijsrecept): self
    {
        $this->Ijsrecept = $Ijsrecept;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
