<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\FoodConsumption;
use App\Entity\Habitat;
use App\Entity\Image;
use App\Entity\OpeningHour;
use App\Entity\Race;
use App\Entity\Review;
use App\Entity\Service;
use App\Entity\User;
use App\Entity\VeterinaryReport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create('fr_FR');

        // Create 5 Reviews
        $reviews = [];

        for ($i = 0; $i < 5; ++$i) {
            $review = new Review();
            $review->setPseudo($faker->name);
            $review->setComment($faker->text(60));
            $review->setIsVisible($faker->boolean(70));
            $manager->persist($review);
            $reviews[] = $review;
        }

        // Create Opening Hours
        $openingHours = [];

        foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $day) {
            $openingHour = new OpeningHour();
            $openingHour->setDay($day);
            $openingHour->setOpen(new \DateTime($faker->time('08:00:00')));
            $openingHour->setClose(new \DateTime($faker->time('18:00:00')));
            $manager->persist($openingHour);
            $openingHours[] = $openingHour;
        }

        // Create 40 images
        $images = [];

        for ($i = 0; $i < 40; ++$i) {
            $image = new Image();
            $image->setImageData($faker->imageUrl(640, 480, 'animals'));
            $manager->persist($image);
            $images[] = $image;
        }

        // Create 9 races
        $races = [];

        foreach (['tigre du bengale', 'ara écarlate', 'toucan à carène', 'lion d\'Afrique', 'éléphant d\'Afrique', 'girafe réticulée', 'flamant rose des caraïbes', 'cerf de Duvaucel (Barasingha)', 'bec-en-sabot du Nil'] as $name) {
            $race = new Race();
            $race->setLabel($name);
            $manager->persist($race);
            $races[] = $race;
        }

        // Create 3 habitats
        $habitats = [];

        foreach (['savane', 'jungle', 'marais'] as $name) {
            $habitat = new Habitat();
            $habitat->setLabel($name);
            $habitat->setDescription($faker->text(100));
            $habitat->setHabitComment($faker->text(50));
            $habitat->addImage($faker->randomElement($images));
            $manager->persist($habitat);
            $habitats[] = $habitat;
        }

        // Create 3 services
        $services = [];

        foreach (['gastronomie en milieu sauvage', 'visites guidées des habitats', 'visites à bord du arc-Express'] as $label) {
            $service = new Service();
            $service->setLabel($label);
            $service->setDescription($faker->text(100));
            $service->addImage($faker->randomElement($images));
            $manager->persist($service);
            $services[] = $service;
        }

        // Create 9 animals
        $animals = [];

        $leonidas = new Animal();
        $leonidas->setName('Leonidas');
        $leonidas->setRace($races[3]);
        $leonidas->setHabitat($habitats[0]);
        $leonidas->setState('excellente forme');
        $leonidas->setSize('2.5');
        $leonidas->setWeight('200');
        $leonidas->addImage($faker->randomElement($images));
        $manager->persist($leonidas);
        $animals[] = $leonidas;

        $ezra = new Animal();
        $ezra->setName('Ezra');
        $ezra->setRace($races[4]);
        $ezra->setHabitat($habitats[0]);
        $ezra->setState('excellente forme');
        $ezra->setSize('3.5');
        $ezra->setWeight('4000');
        $ezra->addImage($faker->randomElement($images));
        $manager->persist($ezra);
        $animals[] = $ezra;

        $grace = new Animal();
        $grace->setName('Grace');
        $grace->setRace($races[5]);
        $grace->setHabitat($habitats[0]);
        $grace->setState('bonne forme');
        $grace->setSize('5.5');
        $grace->setWeight('900');
        $grace->addImage($faker->randomElement($images));
        $manager->persist($grace);
        $animals[] = $grace;

        $indira = new Animal();
        $indira->setName('Indira');
        $indira->setRace($races[0]);
        $indira->setHabitat($habitats[1]);
        $indira->setState('excellente forme');
        $indira->setSize('2.5');
        $indira->setWeight('180');
        $indira->addImage($faker->randomElement($images));
        $manager->persist($indira);
        $animals[] = $indira;

        $maya = new Animal();
        $maya->setName('Maya');
        $maya->setRace($races[1]);
        $maya->setHabitat($habitats[1]);
        $maya->setState('bonne forme');
        $maya->setSize('0.80');
        $maya->setWeight('1');
        $maya->addImage($faker->randomElement($images));
        $manager->persist($maya);
        $animals[] = $maya;

        $zephyr = new Animal();
        $zephyr->setName('zephyr');
        $zephyr->setRace($races[2]);
        $zephyr->setHabitat($habitats[1]);
        $zephyr->setState('excellente forme');
        $zephyr->setSize('0.50');
        $zephyr->setWeight('0.5');
        $zephyr->addImage($faker->randomElement($images));
        $manager->persist($zephyr);
        $animals[] = $zephyr;

        $aria = new Animal();
        $aria->setName('Aria');
        $aria->setRace($races[6]);
        $aria->setHabitat($habitats[2]);
        $aria->setState('bonne forme');
        $aria->setSize('1.2');
        $aria->setWeight('3');
        $aria->addImage($images[array_rand($images)]);
        $manager->persist($aria);
        $animals[] = $aria;

        $galen = new Animal();
        $galen->setName('Galen');
        $galen->setRace($races[7]);
        $galen->setHabitat($habitats[2]);
        $galen->setState('excellente forme');
        $galen->setSize('1.8');
        $galen->setWeight('160');
        $galen->addImage($images[array_rand($images)]);
        $manager->persist($galen);
        $animals[] = $galen;

        $osiris = new Animal();
        $osiris->setName('Osiris');
        $osiris->setRace($races[8]);
        $osiris->setHabitat($habitats[2]);
        $osiris->setState('excellente forme');
        $osiris->setSize('1.5');
        $osiris->setWeight('5');
        $osiris->addImage($images[array_rand($images)]);
        $manager->persist($osiris);
        $animals[] = $osiris;

        // Create 5 Employees
        $employees = [];

        for ($i = 0; $i < 5; ++$i) {
            $employee = new User();
            $employee->setEmail($faker->email);
            $employee->setPassword($faker->password);
            $employee->setRoles(['ROLE_EMPLOYEE']);
            $employee->setFirstname($faker->firstName);
            $employee->setLastname($faker->lastName);
            $manager->persist($employee);
            $employees[] = $employee;
        }

        // Create 5 Veterinaries
        $veterinaries = [];

        for ($i = 0; $i < 5; ++$i) {
            $veterinary = new User();
            $veterinary->setEmail($faker->email)
                        ->setPassword($faker->password)
                        ->setRoles(['ROLE_VETERINARY'])
                        ->setFirstname($faker->firstName)
                        ->setLastname($faker->lastName);
            $manager->persist($veterinary);
            $veterinaries[] = $veterinary;
        }

        // Create 5 Food Consumptions
        $foodConsumptions = [];

        for ($i = 0; $i < 5; ++$i) {
            $foodConsumption = new FoodConsumption();
            $foodConsumption->setAnimal($faker->randomElement($animals));
            $foodConsumption->setDetail($faker->text(50));
            $foodConsumption->setDate($faker->dateTimeBetween('-1 month', 'now'));
            $foodConsumption->setEmployee($faker->randomElement($employees));
            $manager->persist($foodConsumption);
            $foodConsumptions[] = $foodConsumption;
        }

        // Create 5 Veterinary Reports
        $veterinaryReports = [];

        for ($i = 0; $i < 5; ++$i) {
            $veterinaryReport = new VeterinaryReport();
            $veterinaryReport->setAnimal($faker->randomElement($animals));
            $veterinaryReport->setDetail($faker->text(50));
            $veterinaryReport->setDate($faker->dateTimeBetween('-1 month', 'now'));
            $veterinaryReport->setVeterinary($faker->randomElement($veterinaries));
            $manager->persist($veterinaryReport);
            $veterinaryReports[] = $veterinaryReport;
        }

        $manager->flush();
    }
}
