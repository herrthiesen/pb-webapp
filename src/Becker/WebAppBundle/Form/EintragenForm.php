<?php
namespace Becker\WebAppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\Common\Persistence\ObjectManager;
   

class EintragenForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder
                ->setAction('/wa/web/createBuehne/')
                ->setMethod('POST')
                ->add('kategorie'   , 'entity', array(
                        'class' => 'Becker\WebAppBundle\Entity\Kategorie',
                        'property' => 'name',
                        'expanded' => false,
                        'multiple' => false, ))
                ->add('name')
                ->add('ahoehe')
                ->add('korblast')
                ->add('laenge')
                ->add('breite')
                ->add('hoehe')
                ->add('reichweite', 'text', array('required' => false))
                ->add('stuetzbreite', 'text', array('required' => false))
                ->add('hersteller')
                ->add('pdf', 'text', array('required' => false))
                ->add('tag1', 'text', array('required' => false))
                ->add('tag2', 'text', array('required' => false))
                ->add('tag3', 'text', array('required' => false))
                ->add('save', 'submit', array(
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
        return 'becker_webappbundle_buehne';
    }
}