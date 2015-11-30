<?php

namespace Ais\DaftarBundle\Handler;

use Ais\DaftarBundle\Model\DaftarInterface;

interface DaftarHandlerInterface
{
    /**
     * Get a Daftar given the identifier
     *
     * @api
     *
     * @param mixed $id
     *
     * @return DaftarInterface
     */
    public function get($id);

    /**
     * Get a list of Daftars.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($limit = 5, $offset = 0);

    /**
     * Post Daftar, creates a new Daftar.
     *
     * @api
     *
     * @param array $parameters
     *
     * @return DaftarInterface
     */
    public function post(array $parameters);

    /**
     * Edit a Daftar.
     *
     * @api
     *
     * @param DaftarInterface   $daftar
     * @param array           $parameters
     *
     * @return DaftarInterface
     */
    public function put(DaftarInterface $daftar, array $parameters);

    /**
     * Partially update a Daftar.
     *
     * @api
     *
     * @param DaftarInterface   $daftar
     * @param array           $parameters
     *
     * @return DaftarInterface
     */
    public function patch(DaftarInterface $daftar, array $parameters);
}
