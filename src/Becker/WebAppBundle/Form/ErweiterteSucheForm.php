<?php
namespace Becker\WebAppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\Common\Persistence\ObjectManager;
   

class ErweiterteSucheForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder
                ->setAction('/wa/web/search/')
                ->setMethod('POST')
                ->add('kategorie'   , 'entity', array(
                        'class' => 'Becker\WebAppBundle\Entity\Kategorie',
                        'property' => 'name',
                        'expanded' => false,
                        'multiple' => false, ))
                ->add('name', 'text', array('required' => false))
                ->add('ahoehe', 'text', array('required' => false))
                ->add('korblast', 'text', array('required' => false))
                ->add('laenge', 'text', array('required' => false))
                ->add('breite', 'text', array('required' => false))
                ->add('hoehe', 'text', array('required' => false))
                ->add('reichweite', 'text', array('required' => false))
                ->add('stuetzbreite', 'text', array('required' => false))
                ->add('hersteller', 'text', array('required' => false))
                ->add('tag1', 'text', array('required' => false))
                ->add('suchen', 'submit', array(
                    'attr' => array('class' => 'post')))
                ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Becker\WebAppBundle\Entity\Buehne'
        ));
    }

    public function getName()
    {
        return 'becker_webappbundle_erweiterteSuche';
    }
}