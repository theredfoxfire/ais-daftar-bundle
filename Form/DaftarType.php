<?php

namespace Ais\DaftarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DaftarType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('no_daftar')
            ->add('nama')
            ->add('nama_singkat')
            ->add('email')
            ->add('phone')
            ->add('gender')
            ->add('tempat_lahir')
            ->add('tanggal_lahir')
            ->add('agama')
            ->add('is_delete')
            ->add('provinsi_id')
            ->add('kabupaten_id')
            ->add('kecamatan')
            ->add('alamat')
            ->add('pos')
            ->add('asal_sekolah')
            ->add('jumlah_un')
            ->add('jurusan_sekolah')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ais\DaftarBundle\Entity\Daftar',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return '';
    }
}
