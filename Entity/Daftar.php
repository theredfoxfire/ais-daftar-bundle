<?php

namespace Ais\DaftarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ais\DaftarBundle\Model\DaftarInterface;
/**
 * Daftar
 */
class Daftar implements DaftarInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $no_daftar;

    /**
     * @var string
     */
    private $nama;

    /**
     * @var string
     */
    private $nama_singkat;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $tempat_lahir;

    /**
     * @var \DateTime
     */
    private $tanggal_lahir;

    /**
     * @var string
     */
    private $agama;

    /**
     * @var boolean
     */
    private $is_delete;

    /**
     * @var integer
     */
    private $provinsi_id;

    /**
     * @var integer
     */
    private $kabupaten_id;

    /**
     * @var string
     */
    private $kecamatan;

    /**
     * @var string
     */
    private $alamat;

    /**
     * @var string
     */
    private $pos;

    /**
     * @var string
     */
    private $asal_sekolah;

    /**
     * @var string
     */
    private $jumlah_un;

    /**
     * @var string
     */
    private $jurusan_sekolah;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set noDaftar
     *
     * @param string $noDaftar
     *
     * @return Daftar
     */
    public function setNoDaftar($noDaftar)
    {
        $this->no_daftar = $noDaftar;

        return $this;
    }

    /**
     * Get noDaftar
     *
     * @return string
     */
    public function getNoDaftar()
    {
        return $this->no_daftar;
    }

    /**
     * Set nama
     *
     * @param string $nama
     *
     * @return Daftar
     */
    public function setNama($nama)
    {
        $this->nama = $nama;

        return $this;
    }

    /**
     * Get nama
     *
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Set namaSingkat
     *
     * @param string $namaSingkat
     *
     * @return Daftar
     */
    public function setNamaSingkat($namaSingkat)
    {
        $this->nama_singkat = $namaSingkat;

        return $this;
    }

    /**
     * Get namaSingkat
     *
     * @return string
     */
    public function getNamaSingkat()
    {
        return $this->nama_singkat;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Daftar
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Daftar
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Daftar
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set tempatLahir
     *
     * @param string $tempatLahir
     *
     * @return Daftar
     */
    public function setTempatLahir($tempatLahir)
    {
        $this->tempat_lahir = $tempatLahir;

        return $this;
    }

    /**
     * Get tempatLahir
     *
     * @return string
     */
    public function getTempatLahir()
    {
        return $this->tempat_lahir;
    }

    /**
     * Set tanggalLahir
     *
     * @param \DateTime $tanggalLahir
     *
     * @return Daftar
     */
    public function setTanggalLahir($tanggalLahir)
    {
        $this->tanggal_lahir = $tanggalLahir;

        return $this;
    }

    /**
     * Get tanggalLahir
     *
     * @return \DateTime
     */
    public function getTanggalLahir()
    {
        return $this->tanggal_lahir;
    }

    /**
     * Set agama
     *
     * @param string $agama
     *
     * @return Daftar
     */
    public function setAgama($agama)
    {
        $this->agama = $agama;

        return $this;
    }

    /**
     * Get agama
     *
     * @return string
     */
    public function getAgama()
    {
        return $this->agama;
    }

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     *
     * @return Daftar
     */
    public function setIsDelete($isDelete)
    {
        $this->is_delete = $isDelete;

        return $this;
    }

    /**
     * Get isDelete
     *
     * @return boolean
     */
    public function getIsDelete()
    {
        return $this->is_delete;
    }

    /**
     * Set provinsiId
     *
     * @param integer $provinsiId
     *
     * @return Daftar
     */
    public function setProvinsiId($provinsiId)
    {
        $this->provinsi_id = $provinsiId;

        return $this;
    }

    /**
     * Get provinsiId
     *
     * @return integer
     */
    public function getProvinsiId()
    {
        return $this->provinsi_id;
    }

    /**
     * Set kabupatenId
     *
     * @param integer $kabupatenId
     *
     * @return Daftar
     */
    public function setKabupatenId($kabupatenId)
    {
        $this->kabupaten_id = $kabupatenId;

        return $this;
    }

    /**
     * Get kabupatenId
     *
     * @return integer
     */
    public function getKabupatenId()
    {
        return $this->kabupaten_id;
    }

    /**
     * Set kecamatan
     *
     * @param string $kecamatan
     *
     * @return Daftar
     */
    public function setKecamatan($kecamatan)
    {
        $this->kecamatan = $kecamatan;

        return $this;
    }

    /**
     * Get kecamatan
     *
     * @return string
     */
    public function getKecamatan()
    {
        return $this->kecamatan;
    }

    /**
     * Set alamat
     *
     * @param string $alamat
     *
     * @return Daftar
     */
    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;

        return $this;
    }

    /**
     * Get alamat
     *
     * @return string
     */
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * Set pos
     *
     * @param string $pos
     *
     * @return Daftar
     */
    public function setPos($pos)
    {
        $this->pos = $pos;

        return $this;
    }

    /**
     * Get pos
     *
     * @return string
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * Set asalSekolah
     *
     * @param string $asalSekolah
     *
     * @return Daftar
     */
    public function setAsalSekolah($asalSekolah)
    {
        $this->asal_sekolah = $asalSekolah;

        return $this;
    }

    /**
     * Get asalSekolah
     *
     * @return string
     */
    public function getAsalSekolah()
    {
        return $this->asal_sekolah;
    }

    /**
     * Set jumlahUn
     *
     * @param string $jumlahUn
     *
     * @return Daftar
     */
    public function setJumlahUn($jumlahUn)
    {
        $this->jumlah_un = $jumlahUn;

        return $this;
    }

    /**
     * Get jumlahUn
     *
     * @return string
     */
    public function getJumlahUn()
    {
        return $this->jumlah_un;
    }

    /**
     * Set jurusanSekolah
     *
     * @param string $jurusanSekolah
     *
     * @return Daftar
     */
    public function setJurusanSekolah($jurusanSekolah)
    {
        $this->jurusan_sekolah = $jurusanSekolah;

        return $this;
    }

    /**
     * Get jurusanSekolah
     *
     * @return string
     */
    public function getJurusanSekolah()
    {
        return $this->jurusan_sekolah;
    }
    /**
     * @var string
     */
    private $nationality;


    /**
     * Set nationality
     *
     * @param string $nationality
     *
     * @return Daftar
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }
}
