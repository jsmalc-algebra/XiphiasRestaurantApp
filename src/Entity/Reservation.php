<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Full_name = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(length: 30)]
    private ?string $Phone_number = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $Time_slot = null;

    #[ORM\Column]
    private ?int $Party_size = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Special_requests = null;

    #[ORM\Column]
    private ?bool $private_dining = null;

    #[ORM\Column(length: 20)]
    private ?string $Reservation_status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->Full_name;
    }

    public function setFullName(string $Full_name): static
    {
        $this->Full_name = $Full_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->Phone_number;
    }

    public function setPhoneNumber(string $Phone_number): static
    {
        $this->Phone_number = $Phone_number;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getTimeSlot(): ?\DateTime
    {
        return $this->Time_slot;
    }

    public function setTimeSlot(\DateTime $Time_slot): static
    {
        $this->Time_slot = $Time_slot;

        return $this;
    }

    public function getPartySize(): ?int
    {
        return $this->Party_size;
    }

    public function setPartySize(int $Party_size): static
    {
        $this->Party_size = $Party_size;

        return $this;
    }

    public function getSpecialRequests(): ?string
    {
        return $this->Special_requests;
    }

    public function setSpecialRequests(?string $Special_requests): static
    {
        $this->Special_requests = $Special_requests;

        return $this;
    }

    public function isPrivateDining(): ?bool
    {
        return $this->private_dining;
    }

    public function setPrivateDining(bool $private_dining): static
    {
        $this->private_dining = $private_dining;

        return $this;
    }

    public function getReservationStatus(): ?string
    {
        return $this->Reservation_status;
    }

    public function setReservationStatus(string $Reservation_status): static
    {
        $this->Reservation_status = $Reservation_status;

        return $this;
    }
}
