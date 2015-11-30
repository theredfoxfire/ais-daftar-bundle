<?php

namespace Ais\DaftarBundle\Tests\Fixtures\Entity;

use Ais\DaftarBundle\Entity\Daftar;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadDaftarData implements FixtureInterface
{
    static public $daftars = array();

    public function load(ObjectManager $manager)
    {
        $daftar = new Daftar();
        $daftar->setTitle('title');
        $daftar->setBody('body');

        $manager->persist($daftar);
        $manager->flush();

        self::$daftars[] = $daftar;
    }
}
