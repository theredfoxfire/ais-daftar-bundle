<?php

namespace Ais\DaftarBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use Ais\DaftarBundle\Model\DaftarInterface;
use Ais\DaftarBundle\Form\DaftarType;
use Ais\DaftarBundle\Exception\InvalidFormException;

class DaftarHandler implements DaftarHandlerInterface
{
    private $om;
    private $entityClass;
    private $repository;
    private $formFactory;

    public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
    }

    /**
     * Get a Daftar.
     *
     * @param mixed $id
     *
     * @return DaftarInterface
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Get a list of Daftars.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($limit = 5, $offset = 0)
    {
        return $this->repository->findBy(array(), null, $limit, $offset);
    }

    /**
     * Create a new Daftar.
     *
     * @param array $parameters
     *
     * @return DaftarInterface
     */
    public function post(array $parameters)
    {
        $daftar = $this->createDaftar();

        return $this->processForm($daftar, $parameters, 'POST');
    }

    /**
     * Edit a Daftar.
     *
     * @param DaftarInterface $daftar
     * @param array         $parameters
     *
     * @return DaftarInterface
     */
    public function put(DaftarInterface $daftar, array $parameters)
    {
        return $this->processForm($daftar, $parameters, 'PUT');
    }

    /**
     * Partially update a Daftar.
     *
     * @param DaftarInterface $daftar
     * @param array         $parameters
     *
     * @return DaftarInterface
     */
    public function patch(DaftarInterface $daftar, array $parameters)
    {
        return $this->processForm($daftar, $parameters, 'PATCH');
    }

    /**
     * Processes the form.
     *
     * @param DaftarInterface $daftar
     * @param array         $parameters
     * @param String        $method
     *
     * @return DaftarInterface
     *
     * @throws \Ais\DaftarBundle\Exception\InvalidFormException
     */
    private function processForm(DaftarInterface $daftar, array $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create(new DaftarType(), $daftar, array('method' => $method));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) {

            $daftar = $form->getData();
            $this->om->persist($daftar);
            $this->om->flush($daftar);

            return $daftar;
        }

        throw new InvalidFormException('Invalid submitted data', $form);
    }

    private function createDaftar()
    {
        return new $this->entityClass();
    }

}
