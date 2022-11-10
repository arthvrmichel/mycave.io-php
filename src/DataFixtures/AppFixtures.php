<?php

namespace App\DataFixtures;

use App\Entity\Console;
use App\Entity\Edition;
use App\Entity\Game;
use App\Entity\Platform;
use App\Entity\PreservationState;
use App\Entity\Version;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private const DATE_FORMAT = 'd/m/Y';

    public function load(ObjectManager $manager): void
    {
        $palVersion = new Version();
        $palVersion->setName('PAL');
        $manager->persist($palVersion);

        $asianVersion = new Version();
        $asianVersion->setName('NTSC JP');
        $manager->persist($asianVersion);

        $americanVersion = new Version();
        $americanVersion->setName('NTSC');
        $manager->persist($americanVersion);

        $standardEdition = new Edition();
        $standardEdition->setName('Standard');
        $manager->persist($standardEdition);

        $collectorEdition = new Edition();
        $collectorEdition->setName('Collector');
        $manager->persist($collectorEdition);

        $specialEdition = new Edition();
        $specialEdition->setName('Special');
        $manager->persist($specialEdition);

        $new = new PreservationState();
        $new->setName('New');
        $manager->persist($new);

        $veryGood = new PreservationState();
        $veryGood->setName('Very good');
        $manager->persist($veryGood);

        $good = new PreservationState();
        $good->setName('Good');
        $manager->persist($good);

        $average = new PreservationState();
        $average->setName('Average');
        $manager->persist($average);

        $bad = new PreservationState();
        $bad->setName('Bad');
        $manager->persist($bad);

        $platformPS5 = new Platform();
        $platformPS5->setName('PlayStation 5')
            ->setAbbreviation('PS5');
        $manager->persist($platformPS5);

        $ps5Standard = new Console();
        $ps5Standard->setName('PlayStation 5 Standard Edition')
            ->setPlatform($platformPS5)
            ->setEdition($collectorEdition)
            ->setBuyingPrice(49999)
            ->setBuyingDate(DateTime::createFromFormat(self::DATE_FORMAT, '17/09/2020'))
            ->setReleaseDate(DateTime::createFromFormat(self::DATE_FORMAT, '19/11/2020'));
        $manager->persist($ps5Standard);

        $ghostOfTsushima = new Game();
        $ghostOfTsushima->setName('Ghost of Tsushima')
            ->setPlatform($platformPS5)
            ->setPreservationState($veryGood)
            ->setEdition($standardEdition)
            ->setVersion($palVersion)
            ->setReleaseDate(DateTime::createFromFormat(self::DATE_FORMAT, '20/08/2021'))
            ->setBuyingPrice(6999)
            ->setBuyingDate(DateTime::createFromFormat(self::DATE_FORMAT, '29/07/2022'));
        $manager->persist($ghostOfTsushima);

        $manager->flush();
    }
}
