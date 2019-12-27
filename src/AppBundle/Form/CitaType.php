<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CitaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha', 'text')
            ->add('deposito')
            ->add('cliente','entity', array(
                'class' => 'AppBundle:Cliente',
                'property' => 'nombre',
                'required'    => false,
                'empty_value' => 'Seleccione un Cliente',
                'empty_data'  => null
            ))
            ->add('tipo_trabajo','entity', array(
                'class' => 'AppBundle:TipoTrabajo',
                'property' => 'nombre',
                'required'    => false,
                'empty_value' => 'Seleccione un Tipo de Trabajo',
                'empty_data'  => null
            ))
            ->add('artista','entity', array(
                'class' => 'AppBundle:Artista',
                'property' => 'nombre',
                'required'    => false,
                'empty_value' => 'Seleccione un Artista',
                'empty_data'  => null
            ))
            ->add('save', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Cita'
        ));
    }
}
