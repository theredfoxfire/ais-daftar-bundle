<?php

namespace Ais\DaftarBundle\Tests\Handler;

use Ais\DaftarBundle\Handler\DaftarHandler;
use Ais\DaftarBundle\Model\DaftarInterface;
use Ais\DaftarBundle\Entity\Daftar;

class DaftarHandlerTest extends \PHPUnit_Framework_TestCase
{
    const DOSEN_CLASS = 'Ais\DaftarBundle\Tests\Handler\DummyDaftar';

    /** @var DaftarHandler */
    protected $daftarHandler;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $om;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $repository;

    public function setUp()
    {
        if (!interface_exists('Doctrine\Common\Persistence\ObjectManager')) {
            $this->markTestSkipped('Doctrine Common has to be installed for this test to run.');
        }
        
        $class = $this->getMock('Doctrine\Common\Persistence\Mapping\ClassMetadata');
        $this->om = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
        $this->repository = $this->getMock('Doctrine\Common\Persistence\ObjectRepository');
        $this->formFactory = $this->getMock('Symfony\Component\Form\FormFactoryInterface');

        $this->om->expects($this->any())
            ->method('getRepository')
            ->with($this->equalTo(static::DOSEN_CLASS))
            ->will($this->returnValue($this->repository));
        $this->om->expects($this->any())
            ->method('getClassMetadata')
            ->with($this->equalTo(static::DOSEN_CLASS))
            ->will($this->returnValue($class));
        $class->expects($this->any())
            ->method('getName')
            ->will($this->returnValue(static::DOSEN_CLASS));
    }


    public function testGet()
    {
        $id = 1;
        $daftar = $this->getDaftar();
        $this->repository->expects($this->once())->method('find')
            ->with($this->equalTo($id))
            ->will($this->returnValue($daftar));

        $this->daftarHandler = $this->createDaftarHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);

        $this->daftarHandler->get($id);
    }

    public function testAll()
    {
        $offset = 1;
        $limit = 2;

        $daftars = $this->getDaftars(2);
        $this->repository->expects($this->once())->method('findBy')
            ->with(array(), null, $limit, $offset)
            ->will($this->returnValue($daftars));

        $this->daftarHandler = $this->createDaftarHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);

        $all = $this->daftarHandler->all($limit, $offset);

        $this->assertEquals($daftars, $all);
    }

    public function testPost()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('title' => $title, 'body' => $body);

        $daftar = $this->getDaftar();
        $daftar->setTitle($title);
        $daftar->setBody($body);

        $form = $this->getMock('Ais\DaftarBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(true));
        $form->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($daftar));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->daftarHandler = $this->createDaftarHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $daftarObject = $this->daftarHandler->post($parameters);

        $this->assertEquals($daftarObject, $daftar);
    }

    /**
     * @expectedException Ais\DaftarBundle\Exception\InvalidFormException
     */
    public function testPostShouldRaiseException()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('title' => $title, 'body' => $body);

        $daftar = $this->getDaftar();
        $daftar->setTitle($title);
        $daftar->setBody($body);

        $form = $this->getMock('Ais\DaftarBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(false));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->daftarHandler = $this->createDaftarHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $this->daftarHandler->post($parameters);
    }

    public function testPut()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('title' => $title, 'body' => $body);

        $daftar = $this->getDaftar();
        $daftar->setTitle($title);
        $daftar->setBody($body);

        $form = $this->getMock('Ais\DaftarBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(true));
        $form->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($daftar));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->daftarHandler = $this->createDaftarHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $daftarObject = $this->daftarHandler->put($daftar, $parameters);

        $this->assertEquals($daftarObject, $daftar);
    }

    public function testPatch()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('body' => $body);

        $daftar = $this->getDaftar();
        $daftar->setTitle($title);
        $daftar->setBody($body);

        $form = $this->getMock('Ais\DaftarBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(true));
        $form->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($daftar));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->daftarHandler = $this->createDaftarHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $daftarObject = $this->daftarHandler->patch($daftar, $parameters);

        $this->assertEquals($daftarObject, $daftar);
    }


    protected function createDaftarHandler($objectManager, $daftarClass, $formFactory)
    {
        return new DaftarHandler($objectManager, $daftarClass, $formFactory);
    }

    protected function getDaftar()
    {
        $daftarClass = static::DOSEN_CLASS;

        return new $daftarClass();
    }

    protected function getDaftars($maxDaftars = 5)
    {
        $daftars = array();
        for($i = 0; $i < $maxDaftars; $i++) {
            $daftars[] = $this->getDaftar();
        }

        return $daftars;
    }
}

class DummyDaftar extends Daftar
{
}
