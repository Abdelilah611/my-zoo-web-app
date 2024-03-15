<?php

namespace App\Tests\Entity;

use App\Entity\Image;
use App\Entity\Service;
use App\Entity\Habitat;
use App\Entity\Animal;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function testGetSetImageData()
    {
        $image = new Image();
        $imageData = '...'; // Set the image data here

        $image->setImageData($imageData);

        $this->assertSame($imageData, $image->getImageData());
    }

    public function testAddRemoveService()
    {
        $image = new Image();
        $service = new Service();

        $image->addService($service);
        $this->assertTrue($image->getServices()->contains($service));
        $this->assertTrue($service->getImages()->contains($image));

        $image->removeService($service);
        $this->assertFalse($image->getServices()->contains($service));
        $this->assertFalse($service->getImages()->contains($image));
    }

    public function testAddRemoveHabitat()
    {
        $image = new Image();
        $habitat = new Habitat();

        $image->addHabitat($habitat);
        $this->assertTrue($image->getHabitats()->contains($habitat));
        $this->assertTrue($habitat->getImages()->contains($image));

        $image->removeHabitat($habitat);
        $this->assertFalse($image->getHabitats()->contains($habitat));
        $this->assertFalse($habitat->getImages()->contains($image));
    }

    public function testAddRemoveAnimal()
    {
        $image = new Image();
        $animal = new Animal();

        $image->addAnimal($animal);
        $this->assertTrue($image->getAnimals()->contains($animal));
        $this->assertTrue($animal->getImages()->contains($image));

        $image->removeAnimal($animal);
        $this->assertFalse($image->getAnimals()->contains($animal));
        $this->assertFalse($animal->getImages()->contains($image));
    }

    public function testGetId()
    {
        $image = new Image();
        $this->assertNull($image->getId());
    }
}