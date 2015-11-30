<?php

namespace Ais\DaftarBundle\Model;

Interface DaftarInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set noDaftar
     *
     * @param string $noDaftar
     *
     * @return Daftar
     */
    public function setNoDaftar($noDaftar);

    /**
     * Get noDaftar
     *
     * @return string
     */
    public function getNoDaftar();

    /**
     * Set nama
     *
     * @param string $nama
     *
     * @return Daftar
     */
    public function setNama($nama);

    /**
     * Get nama
     *
     * @return string
     */
    public function getNama();

    /**
     * Set namaSingkat
     *
     * @param string $namaSingkat
     *
     * @return Daftar
     */
    public function setNamaSingkat($namaSingkat);

    /**
     * Get namaSingkat
     *
     * @return string
     */
    public function getNamaSingkat();

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Daftar
     */
    public function setEmail($email);

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Daftar
     */
    public function setPhone($phone);

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone();

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Daftar
     */
    public function setGender($gender);

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender();

    /**
     * Set tempatLahir
     *
     * @param string $tempatLahir
     *
     * @return Daftar
     */
    public function setTempatLahir($tempatLahir);

    /**
     * Get tempatLahir
     *
     * @return string
     */
    public function getTempatLahir();

    /**
     * Set tanggalLahir
     *
     * @param \DateTime $tanggalLahir
     *
     * @return Daftar
     */
    public function setTanggalLahir($tanggalLahir);

    /**
     * Get tanggalLahir
     *
     * @return \DateTime
     */
    public function getTanggalLahir();

    /**
     * Set agama
     *
     * @param string $agama
     *
     * @return Daftar
     */
    public function setAgama($agama);

    /**
     * Get agama
     *
     * @return string
     */
    public function getAgama();

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     *
     * @return Daftar
     */
    public function setIsDelete($isDelete);

    /**
     * Get isDelete
     *
     * @return boolean
     */
    public function getIsDelete();

    /**
     * Set provinsiId
     *
     * @param integer $provinsiId
     *
     * @return Daftar
     */
    public function setProvinsiId($provinsiId);

    /**
     * Get provinsiId
     *
     * @return integer
     */
    public function getProvinsiId();

    /**
     * Set kabupatenId
     *
     * @param integer $kabupatenId
     *
     * @return Daftar
     */
    public function setKabupatenId($kabupatenId);

    /**
     * Get kabupatenId
     *
     * @return integer
     */
    public function getKabupatenId();

    /**
     * Set kecamatan
     *
     * @param string $kecamatan
     *
     * @return Daftar
     */
    public function setKecamatan($kecamatan);

    /**
     * Get kecamatan
     *
     * @return string
     */
    public function getKecamatan();

    /**
     * Set alamat
     *
     * @param string $alamat
     *
     * @return Daftar
     */
    public function setAlamat($alamat);

    /**
     * Get alamat
     *
     * @return string
     */
    public function getAlamat();

    /**
     * Set pos
     *
     * @param string $pos
     *
     * @return Daftar
     */
    public function setPos($pos);

    /**
     * Get pos
     *
     * @return string
     */
    public function getPos();

    /**
     * Set asalSekolah
     *
     * @param string $asalSekolah
     *
     * @return Daftar
     */
    public function setAsalSekolah($asalSekolah);

    /**
     * Get asalSekolah
     *
     * @return string
     */
    public function getAsalSekolah();

    /**
     * Set jumlahUn
     *
     * @param string $jumlahUn
     *
     * @return Daftar
     */
    public function setJumlahUn($jumlahUn);

    /**
     * Get jumlahUn
     *
     * @return string
     */
    public function getJumlahUn();

    /**
     * Set jurusanSekolah
     *
     * @param string $jurusanSekolah
     *
     * @return Daftar
     */
    public function setJurusanSekolah($jurusanSekolah);

    /**
     * Get jurusanSekolah
     *
     * @return string
     */
    public function getJurusanSekolah();
}
