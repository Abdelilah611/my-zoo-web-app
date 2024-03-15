<?php

namespace App\Tests\Entity;

use App\Entity\VeterinaryReport;
use App\Entity\User;
use App\Entity\Animal;
use PHPUnit\Framework\TestCase;

class VeterinaryReportTest extends TestCase
{
    public function testGetSetVeterinary()
    {
        $report = new VeterinaryReport();
        $veterinary = new User();
        $report->setVeterinary($veterinary);

        $this->assertSame($veterinary, $report->getVeterinary());
    }

    public function testGetSetAnimal()
    {
        $report = new VeterinaryReport();
        $animal = new Animal();
        $report->setAnimal($animal);

        $this->assertSame($animal, $report->getAnimal());
    }
}