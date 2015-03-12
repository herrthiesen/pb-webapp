<?php
namespace Becker\WebAppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\Common\Persistence\ObjectManager;
   

class AnfrageBuehneForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {     
        //echo 'Form '.$this->options['buehneName'];
        $builder
                ->setAction('/wa/web/sendeAnfrage/')
                ->setMethod('POST')
                ->add('m_w', 'choice', array(
    'choices'   => array('w' => 'Frau', 'm' => 'Herr')))
                ->add('buehne_id', 'hidden')
                ->add('buehneName', 'hidden')
                ->add('mietenVom', 'text', array('attr' => array(            'placeholder' => 'Mietbeginn',)))
                ->add('mietenBis', 'text', array('attr' => array(            'placeholder' => 'Mietende',)))
                ->add('einsatzort', 'text', array(
    'attr' => array('class' => 'form-control', 'placeholder' => 'Einsatzort',)))
                ->add('kundeName', 'text', array(
    'attr' => array('class' => 'form-control', 'placeholder' => 'Name',)))
                ->add('kundeFirma', 'text', array(
    'attr' => array('class' => 'form-control', 'placeholder' => 'Firma (optional)',), 'required' => false))  
                ->add('kundeTel', 'text', array(
    'attr' => array('class' => 'form-control', 'placeholder' => 'Telefon',)))
                ->add('kundeEmail', 'text', array(
    'attr' => array('class' => 'form-control', 'placeholder' => 'Email',)))
                ->add('bemerkung', 'textarea', array(
    'attr' => array('class' => 'form-control', 'placeholder' => 'Sonstige Bemerkungen',), 'required' => false))
                ->add('senden', 'submit', array(
                    'attr' => array('class' => 'post')))
                ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Becker\WebAppBundle\Entity\Anfrage'
        ));
    }
    

    public function getName()
    {
        return 'becker_webappbundle_anfrageBuehne';
    }
}