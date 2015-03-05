<?php

namespace Becker\WebAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Becker\WebAppBundle\Entity\Buehne;
use Becker\WebAppBundle\Entity\Kategorie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Becker\WebAppBundle\Form\EintragenForm;
use Becker\WebAppBundle\Form\ErweiterteSucheForm;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Session\Session;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BeckerWebAppBundle:Default:index.html.twig');
    }
    
    public function eintragenAction()
    {
        $buehne = new Buehne();
        $em = $this->getDoctrine()->getManager();
        $em->persist($buehne);
        
        $form = $this->createForm(new EintragenForm(), $buehne);
        
        return $this->render('BeckerWebAppBundle:Default:eintragen.html.twig', array('form' => $form->createView(), $buehne));
    }
    
    public function searchAction(Request $request)
    {
        if ($request->getMethod() == 'POST')
        {
            
            $term = $request->request->get('term');
            if (!$term)
            {
                //=====================================
                //Check if search is an advanced search
                //=====================================
                
                
                $form = $this->createForm(new ErweiterteSucheForm());
                $request = Request::createFromGlobals();
                $form->handleRequest($request);
            
                if ($form->isValid()) 
                {       
                    $term = $form->get('name')->getData();
                    if(strlen($term) > 0)
                        {$term = 'name:'.$term;}
                    else
                    {    
                        $term = $form->get('ahoehe')->getData();
                        if(strlen($term) > 0)
                            {$term = 'ahoehe:'.$term;} 
                        else
                        {    
                            $term = $form->get('korblast')->getData();
                            if(strlen($term) > 0)
                                {$term = 'korblast:'.$term;} 
                            else
                            {    
                                $term = $form->get('reichweite')->getData();
                                if(strlen($term) > 0)
                                    {$term = 'reichweite:'.$term;} 
                                else
                                {    
                                    $term = $form->get('laenge')->getData();
                                    if(strlen($term) > 0)
                                        {$term = 'laenge:'.$term;} 
                                    else
                                    {    
                                        $term = $form->get('breite')->getData();
                                        if(strlen($term) > 0)
                                            {$term = 'breite:'.$term;} 
                                        else
                                        {    
                                            $term = $form->get('hoehe')->getData();
                                            if(strlen($term) > 0)
                                                {$term = 'hoehe:'.$term;}
                                            else
                                            {    
                                                $term = $form->get('stuetzbreite')->getData();
                                                if(strlen($term) > 0)
                                                    {$term = 'stuetzbreite:'.$term;} 
                                                else
                                                {    
                                                    $term = $form->get('hersteller')->getData();
                                                    if(strlen($term) > 0)
                                                        {$term = 'hersteller:'.$term;} 
                                                    else
                                                    {    
                                                        $term = $form->get('tag1')->getData();
                                                        if(strlen($term) > 0)
                                                            {$term = 'tag:'.$term;} 
                                                    }    
                                                }
                                            }
                                        }
                                    }    
                                }    
                            }
                        }
                    }
                    
                    if(strlen($term) > 0)
                    { 
                        
                        return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('term' => $term)); 
                    }
                    else
                    {
                        //Create Advanced Search Form
                        $buehne = new Buehne();
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($buehne);

                        $form = $this->createForm(new ErweiterteSucheForm(), $buehne);

                        return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('form' => $form->createView(), 'term' => $term));
                    }
                }
                else
                {
                    //Create Advanced Search Form
                    $buehne = new Buehne();
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($buehne);

                    $form = $this->createForm(new ErweiterteSucheForm(), $buehne);

                    return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('form' => $form->createView(), 'term' => $term));
                }
                
            }
            else
            {
                if(strpos($term, ':'))
                {
                    return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('term' => $term));  
                }
                else
                {
                    return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('term' => 'any:'.$term));   
                }
            }
        }
        else 
        {
            //Create Advanced Search Form
            $buehne = new Buehne();
            $em = $this->getDoctrine()->getManager();
            $em->persist($buehne);

            $form = $this->createForm(new ErweiterteSucheForm(), $buehne);
            $term = '';

            return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('form' => $form->createView(), 'term' => $term));
        }
    }
    
    public function erweiterteSucheAction()
    {
        $buehne = new Buehne();
        $em = $this->getDoctrine()->getManager();
        $em->persist($buehne);
        
        $form = $this->createForm(new ErweiterteSucheForm(), $buehne);
        
        return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('form' => $form->createView(), $buehne, 'term' => ''));
    }
    
    
    public function arbeitsbuehnenAction()
    {
        return $this->render('BeckerWebAppBundle:Default:arbeitsbuehnen.html.twig');
    }
    
    public function arbeitsbuehneAction()
    {
        return $this->render('BeckerWebAppBundle:Default:arbeitsbuehne.html.twig');
    }
    
    public function lkwAction()
    {
        return $this->render('BeckerWebAppBundle:Default:lkw.html.twig');
    }
    
    public function gelenkAction()
    {
        return $this->render('BeckerWebAppBundle:Default:gelenk.html.twig');
    }
   
    public function teleskopAction()
    {
        return $this->render('BeckerWebAppBundle:Default:teleskop.html.twig');
    }
    
    public function scherenAction()
    {
        return $this->render('BeckerWebAppBundle:Default:scheren.html.twig');
    }
    
    public function anhaengerAction()
    {
        return $this->render('BeckerWebAppBundle:Default:anhaenger.html.twig');
    }  
        
    public function mastAction()
    {
        return $this->render('BeckerWebAppBundle:Default:mast.html.twig');
    }   
    
    public function liftAction()
    {
        return $this->render('BeckerWebAppBundle:Default:lift.html.twig');
    } 
        
    public function kettenAction()
    {
        return $this->render('BeckerWebAppBundle:Default:ketten.html.twig');
    }
    
     /**
     * 
     * @Route("/arbeitsbuehne/create")
     */
    public function create2BuehneAction()
    {
        $kategorie = new Kategorie();
        $kategorie->setName('LKW Arbeitsbühne');
        
        $buehne = new Buehne();
        $buehne->setName('L 180 035 LTDJ');
        $buehne->setAhoehe('18.20');
        $buehne->setKorblast('200');
        $buehne->setLaenge('6.68');
        $buehne->setBreite('2.10');
        $buehne->setHoehe('2.80');
        $buehne->setReichweite('12.90');
        $buehne->setStuetzbreite('3.60');
        $buehne->setHersteller('Multitel');
        $buehne->setPdf('xxx');
        $buehne->setKategorie($kategorie);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($kategorie);
        $em->persist($buehne);
        $em->flush();
        
        return new Response('Bühne wurde angelegt mit der ID '.$buehne->getId());
    }  
    
    /**
     * @Route("/arbeitsbuehne/show/{id}", defaults={"id" = 1})
     */
    public function showBuehneAction($id)
    {      
        
        //$form = $this->createForm(new anfrageBuehneForm(), $id);
        
        //return $this->render('BeckerWebAppBundle:Default:eintragen.html.twig', array('form' => $form->createView(), $buehne));
        
                        
        return $this->render('BeckerWebAppBundle:Default:arbeitsbuehne.html.twig', array('id' => $id));
        
    }   

    public function markerAction()
    {      
        //$session = new Session();
        //$session->start();

        $session = $this->getRequest()->getSession();
        
        if(!$session->getId())
        {
            $session = new Session();
            $session->start();
        }
        
        $count = 1;
        $id = 33;
        $session->set('marks', array('1' => $id));
                        
        return $this->render('BeckerWebAppBundle:Default:marker.html.twig');
        
    }  
    
}
