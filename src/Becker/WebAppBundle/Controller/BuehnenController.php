<?php

    namespace Becker\WebAppBundle\Controller;
    
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    use Becker\WebAppBundle\Entity\Buehne;
    use Becker\WebAppBundle\Entity\Kategorie;
    use Becker\WebAppBundle\Form\EintragenForm;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Doctrine\ORM\EntityRepository;
    
class BuehnenController extends Controller
{
    public function getBuehnenListByKategorieAction($id)
    {
        $kategorie = $this->getDoctrine() 
                ->getRepository('BeckerWebAppBundle:Kategorie')
                ->find($id);
        
        if(!$kategorie) {
            throw $this->createNotFoundException(
                    'Keine Kategorie gefunden mit der ID'.$id
            );
        }
        
        $repository = $this->getDoctrine()
        ->getRepository('BeckerWebAppBundle:Buehne');
        
        
        $query = $repository->createQueryBuilder('b') 
            ->where('b.kategorie = :kat')
            ->orderBy('b.name', 'ASC')
            ->setParameter('kat', $kategorie)
            ->getQuery();

        $buehnen = $query->getResult();
        
        //$buehnen = $kategorie->getBuehnen();
        
        return $this->render(
                'arbeitsbuehnen/buehnenKategorie.html.twig',
        array('buehnen' => $buehnen, 'kategorien' => $kategorie)
                );
    }
    
        public function getBuehnenTabelleByKategorieAction($id)
    {
        $kategorie = $this->getDoctrine()
                ->getRepository('BeckerWebAppBundle:Kategorie')
                ->find($id);
        
        if(!$kategorie) {
            throw $this->createNotFoundException(
                    'Keine Kategorie gefunden mit der ID'.$id
            );
        }
        
        $repository = $this->getDoctrine()
        ->getRepository('BeckerWebAppBundle:Buehne');
        
        
        $query = $repository->createQueryBuilder('b') 
            ->where('b.kategorie = :kat')
            ->orderBy('b.name', 'ASC')
            ->setParameter('kat', $kategorie)
            ->getQuery();

        $buehnen = $query->getResult();
        
        //$buehnen = $kategorie->getBuehnen();
        
        switch($id)
        {
            case 2:
                return $this->render(
                        'arbeitsbuehnen/buehnenKategorieTabelleLkw.html.twig',
                array('buehnen' => $buehnen, 'kategorie' => $kategorie)
                        );
                break;
            case 9:
                return $this->render(
                        'arbeitsbuehnen/buehnenKategorieTabelleGelenk.html.twig',
                array('buehnen' => $buehnen, 'kategorie' => $kategorie)
                        );
                break;
            case 10:
                return $this->render(
                        'arbeitsbuehnen/buehnenKategorieTabelleTeleskop.html.twig',
                array('buehnen' => $buehnen, 'kategorie' => $kategorie)
                        );
                break;
            case 13:
                return $this->render(
                        'arbeitsbuehnen/buehnenKategorieTabelleSchere.html.twig',
                array('buehnen' => $buehnen, 'kategorie' => $kategorie)
                        );
                break;
            case 14:
                return $this->render(
                        'arbeitsbuehnen/buehnenKategorieTabelleAnhaenger.html.twig',
                array('buehnen' => $buehnen, 'kategorie' => $kategorie)
                        );
                break;
            case 15:
                return $this->render(
                        'arbeitsbuehnen/buehnenKategorieTabelleMast.html.twig',
                array('buehnen' => $buehnen, 'kategorie' => $kategorie)
                        );
                break;
            case 16:
                return $this->render(
                        'arbeitsbuehnen/buehnenKategorieTabelleLifte.html.twig',
                array('buehnen' => $buehnen, 'kategorie' => $kategorie)
                        );
                break;
            case 17:
                return $this->render(
                        'arbeitsbuehnen/buehnenKategorieTabelleKetten.html.twig',
                array('buehnen' => $buehnen, 'kategorie' => $kategorie)
                        );
                break;  
            case 18:
                return $this->render(
                        'arbeitsbuehnen/KategorieTabelleStapler.html.twig',
                array('buehnen' => $buehnen, 'kategorie' => $kategorie)
                        );
                break;
        }
    }
        
    public function getKategorienAction()
    {
        $kategorie = $this->getDoctrine()
                ->getRepository('BeckerWebAppBundle:Kategorie');
        
        if(!$kategorie) {
            throw $this->createNotFoundException(
                    'Keine Kategorie gefunden mit der ID'
            );
        }
        
        return $this->$kategorie;
    }
    
    public function searchAction($term)
    {
        $repository = $this->getDoctrine()
        ->getRepository('BeckerWebAppBundle:Buehne');

        switch ($term)
        {
            case strpos($term, 'any:') === 0:
                //return new Response('Switch ');
                $term = str_replace("any:", "", $term);
                $query = $repository->createQueryBuilder('b')
                ->where('b.name LIKE :term')
                ->orWhere('b.hersteller LIKE :term')                
                ->orWhere('b.ahoehe LIKE :term')  
                ->orWhere('b.korblast LIKE :term')
                ->orWhere('b.laenge LIKE :term')
                ->orWhere('b.breite LIKE :term')
                ->orWhere('b.hoehe LIKE :term')
                ->orWhere('b.reichweite LIKE :term')                
                ->orWhere('b.stuetzbreite LIKE :term')                
                ->orWhere('b.tag1 LIKE :term')                
                ->orWhere('b.tag2 LIKE :term')                
                ->orWhere('b.tag3 LIKE :term')                
                ->orderBy('b.name', 'ASC')
                ->setParameter('term', '%'.$term.'%')
                ->getQuery();            
                break;
            case strpos($term, 'name:') === 0:
                //return new Response('Switch ');
                $term = str_replace("name:", "", $term);
                $query = $repository->createQueryBuilder('b')
                ->where('b.name LIKE :term')    
                ->orderBy('b.name', 'ASC')
                ->setParameter('term', '%'.$term.'%')
                ->getQuery();
                break;
            case strpos($term, 'ahoehe:') === 0:
                $term = str_replace("ahoehe:", "", $term);
                if(strpos($term, '>') === 0 )
                {
                    $term = str_replace(">", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.ahoehe > = :term')    
                    ->orderBy('b.ahoehe', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                elseif(strpos($term, '<') === 0 )
                {
                    $term = str_replace("<", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.ahoehe < = :term')    
                    ->orderBy('b.ahoehe', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                else
                {
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.ahoehe LIKE :term')    
                        ->orderBy('b.ahoehe', 'ASC')
                        ->setParameter('term', '%'.$term.'%')
                        ->getQuery();
                }
                break;
            case strpos($term, 'korblast:') === 0:
                $term = str_replace("korblast:", "", $term);
                if(strpos($term, '>') === 0 )
                {
                    $term = str_replace(">", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.korblast > = :term')    
                    ->orderBy('b.korblast', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                elseif(strpos($term, '<') === 0 )
                {
                    $term = str_replace("<", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.korblast < = :term')    
                    ->orderBy('b.korblast', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                else
                {
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.korblast LIKE :term')    
                        ->orderBy('b.korblast', 'ASC')
                        ->setParameter('term', '%'.$term.'%')
                        ->getQuery();
                }
                break;
            case strpos($term, 'laenge:') === 0:
                $term = str_replace("laenge:", "", $term);
                if(strpos($term, '>') === 0 )
                {
                    $term = str_replace(">", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.laenge > = :term')    
                    ->orderBy('b.laenge', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                elseif(strpos($term, '<') === 0 )
                {
                    $term = str_replace("<", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.laenge < = :term')    
                    ->orderBy('b.laenge', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                else
                {
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.laenge LIKE :term')    
                        ->orderBy('b.laenge', 'ASC')
                        ->setParameter('term', '%'.$term.'%')
                        ->getQuery();
                }
                break;
            case strpos($term, 'breite:') === 0:
                $term = str_replace("breite:", "", $term);            
                if(strpos($term, '>') === 0 )
                {
                    $term = str_replace(">", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.breite > = :term')    
                    ->orderBy('b.breite', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                elseif(strpos($term, '<') === 0 )
                {
                    $term = str_replace("<", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.breite < = :term')    
                    ->orderBy('b.breite', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                else
                {
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.breite LIKE :term')    
                        ->orderBy('b.breite', 'ASC')
                        ->setParameter('term', '%'.$term.'%')
                        ->getQuery();
                }
                break;   
            case strpos($term, 'reichweite:') === 0:
                $term = str_replace("reichweite:", "", $term);
                if(strpos($term, '>') === 0 )
                {
                    $term = str_replace(">", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.reichweite > = :term')    
                    ->orderBy('b.reichweite', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                elseif(strpos($term, '<') === 0 )
                {
                    $term = str_replace("<", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.reichweite < = :term')    
                    ->orderBy('b.reichweite', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                else
                {
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.reichweite LIKE :term')    
                        ->orderBy('b.reichweite', 'ASC')
                        ->setParameter('term', '%'.$term.'%')
                        ->getQuery();
                }
                break;     
            case strpos($term, 'hoehe:') === 0:
                $term = str_replace("hoehe:", "", $term);
                if(strpos($term, '>') === 0 )
                {
                    $term = str_replace(">", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.hoehe > = :term')    
                    ->orderBy('b.hoehe', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                elseif(strpos($term, '<') === 0 )
                {
                    $term = str_replace("<", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.hoehe < = :term')    
                    ->orderBy('b.hoehe', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                else
                {
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.hoehe LIKE :term')    
                        ->orderBy('b.hoehe', 'ASC')
                        ->setParameter('term', '%'.$term.'%')
                        ->getQuery();
                }
                break;  
            case strpos($term, 'stuetzbreite:') === 0:
                $term = str_replace("stuetzbreite:", "", $term);
                if(strpos($term, '>') === 0 )
                {
                    $term = str_replace(">", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.stuetzbreite > = :term')    
                    ->orderBy('b.stuetzbreite', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                elseif(strpos($term, '<') === 0 )
                {
                    $term = str_replace("<", "", $term);
                    $query = $repository->createQueryBuilder('b')
                    ->where('b.stuetzbreite < = :term')    
                    ->orderBy('b.stuetzbreite', 'ASC')
                    ->setParameter('term', $term)
                    ->getQuery();
                }
                else
                {
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.stuetzbreite LIKE :term')    
                        ->orderBy('b.stuetzbreite', 'ASC')
                        ->setParameter('term', '%'.$term.'%')
                        ->getQuery();
                }
                break;     
            case strpos($term, 'hersteller:') === 0:
                $term = str_replace("hersteller:", "", $term);
                $query = $repository->createQueryBuilder('b')
                    ->where('b.hersteller LIKE :term')    
                    ->orderBy('b.hersteller', 'ASC')
                    ->setParameter('term', '%'.$term.'%')
                    ->getQuery();
                break;          
            case strpos($term, 'tag:') === 0:
                $term = str_replace("tag:", "", $term);
                $query = $repository->createQueryBuilder('b')
                    ->where('b.tag1 LIKE :term')                                      
                    ->orWhere('b.tag2 LIKE :term')                
                    ->orWhere('b.tag3 LIKE :term')                
                    ->orderBy('b.name', 'ASC')
                    ->setParameter('term', '%'.$term.'%')
                    ->getQuery();
                break;    
            default:
                $query = $repository->createQueryBuilder('b')
                ->where('b.name LIKE :term')
                ->orWhere('b.hersteller LIKE :term')                
                ->orWhere('b.ahoehe LIKE :term')  
                ->orWhere('b.korblast LIKE :term')
                ->orWhere('b.laenge LIKE :term')
                ->orWhere('b.breite LIKE :term')
                ->orWhere('b.hoehe LIKE :term')
                ->orWhere('b.reichweite LIKE :term')                
                ->orWhere('b.stuetzbreite LIKE :term')                
                ->orWhere('b.tag1 LIKE :term')                
                ->orWhere('b.tag2 LIKE :term')                
                ->orWhere('b.tag3 LIKE :term')                
                ->orderBy('b.name', 'ASC')
                ->setParameter('term', '%'.$term.'%')
                ->getQuery();
        }
        
        $buehnen = $query->getResult();
        $total = count($buehnen);
        //return new Response('Bühne wurde angelegt mit der ID '.$term);
        return $this->render(
                'arbeitsbuehnen/searchResults.html.twig',
                array('buehnen' => $buehnen, 'term' => $term, 'total' => $total)
                );        
    }
    
    public function createBuehneAction(Request $request)
    {
        
        if ('POST' == $request->getMethod())
        {
            $form = $this->createForm(new EintragenForm());
            $request = Request::createFromGlobals();
            $form->handleRequest($request);
            
            if ($form->isValid()) {
                $img = $form->get('name')->getData();
                $img = preg_replace('/\s+/', '-',  $img);
                $pdf = $img;
                $buehne = new Buehne();
                $buehne->setName($form->get('name')->getData());
                $buehne->setAhoehe($form->get('ahoehe')->getData());
                $buehne->setKorblast($form->get('korblast')->getData());
                $buehne->setLaenge($form->get('laenge')->getData());
                $buehne->setBreite($form->get('breite')->getData());
                $buehne->setHoehe($form->get('hoehe')->getData());
                $buehne->setReichweite($form->get('reichweite')->getData());
                $buehne->setStuetzbreite($form->get('stuetzbreite')->getData());
                $buehne->setHersteller($form->get('hersteller')->getData());
                $buehne->setPdf($pdf);
                $buehne->setImg($img);
                $buehne->setTag1($form->get('tag1')->getData());
                $buehne->setTag2($form->get('tag2')->getData());
                $buehne->setTag3($form->get('tag3')->getData());                
                $buehne->setKategorie($form->get('kategorie')->getValues());

                $em = $this->getDoctrine()->getManager();
                $em->persist($buehne);
                $em->flush();

                /** return new Response('Bühne wurde angelegt mit der ID '.$buehne->getId()); **/
                return $this->redirect($this->generateUrl('becker_web_app_eintragen'));
            }
        }
    }
    
    public function erweiterteSucheAction(Request $request)
    {
        if ('POST' == $request->getMethod())
        {
            $form = $this->createForm(new ErweiterteSucheFormForm());
            $request = Request::createFromGlobals();
            $form->handleRequest($request);
            
            if ($form->isValid()) {
                $img = $form->get('name')->getData();
                $img = preg_replace('/\s+/', '-',  $img);
                
                $buehne = new Buehne();
                $buehne->setName($form->get('name')->getData());
                $buehne->setAhoehe($form->get('ahoehe')->getData());
                $buehne->setKorblast($form->get('korblast')->getData());
                $buehne->setLaenge($form->get('laenge')->getData());
                $buehne->setBreite($form->get('breite')->getData());
                $buehne->setHoehe($form->get('hoehe')->getData());
                $buehne->setReichweite($form->get('reichweite')->getData());
                $buehne->setStuetzbreite($form->get('stuetzbreite')->getData());
                $buehne->setHersteller($form->get('hersteller')->getData());
                $buehne->setPdf($form->get('pdf')->getData());
                $buehne->setImg($img);
                $buehne->setTag1($form->get('tag1')->getData());
                $buehne->setTag2($form->get('tag2')->getData());
                $buehne->setTag3($form->get('tag3')->getData());
                $buehne->setKategorie($form->get('kategorie')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($buehne);
                $em->flush();

                /** return new Response('Bühne wurde angelegt mit der ID '.$buehne->getId()); **/
                return $this->redirect($this->generateUrl('becker_web_app_eintragen'));
            }
        }
        $term = "";
        
        $repository = $this->getDoctrine()
        ->getRepository('BeckerWebAppBundle:Buehne');

        $query = $repository->createQueryBuilder('b')
            ->where('b.name LIKE :term')
            ->orWhere('b.hersteller LIKE :term')                
            ->orWhere('b.ahoehe LIKE :term')  
            ->orWhere('b.korblast LIKE :term')
            ->orWhere('b.laenge LIKE :term')
            ->orWhere('b.breite LIKE :term')
            ->orWhere('b.hoehe LIKE :term')
            ->orWhere('b.reichweite LIKE :term')                
            ->orWhere('b.stuetzbreite LIKE :term')                
            ->orWhere('b.tag1 LIKE :term')                
            ->orWhere('b.tag2 LIKE :term')                
            ->orWhere('b.tag3 LIKE :term')                
            ->orderBy('b.name', 'ASC')
            ->setParameter('term', '%'.$term.'%')
            ->getQuery();

        $buehnen = $query->getResult();

        //return new Response('Bühne wurde angelegt mit der ID '.$term);
        return $this->render(
                'arbeitsbuehnen/buehnenKategorie.html.twig',
                array('buehnen' => $buehnen)
                );
    }
    
    public function getAllBuehnenAction()
    {
        $repository = $this->getDoctrine()
        ->getRepository('BeckerWebAppBundle:Buehne');

        $query = $repository->createQueryBuilder('b')                   
            ->orderBy('b.name', 'ASC')
            ->getQuery();

        $buehnen = $query->getResult();

        //return new Response('Bühne wurde angelegt mit der ID '.$term);
        return $this->render(
                'arbeitsbuehnen/buehnenKategorie.html.twig',
                array('buehnen' => $buehnen)
                );
    }
    
    public function getBuehneByIdAction($id)
    {
        $buehne = $this->getDoctrine()
                ->getRepository('BeckerWebAppBundle:Buehne')
                ->find($id);
        
        if(!$buehne) {
            throw $this->createNotFoundException(
                    'Keine Bühne gefunden mit der ID'.$id
            );
        }
        
        return $this->render(
                'arbeitsbuehnen/buehneDetails.html.twig',
        array('buehne' => $buehne)
                );
    }
    
    public function getLatestBuehnenAction()
    {
        $repository = $this->getDoctrine()
        ->getRepository('BeckerWebAppBundle:Buehne');
        
        $query = $repository->createQueryBuilder('b')                   
            ->orderBy('b.created', 'DESC')                
            ->setMaxResults(3)
            ->getQuery();

        $buehnen = $query->getResult();
        return $this->render(
                'arbeitsbuehnen/latestBuehnen.html.twig',
                array('buehnen' => $buehnen)
                );
    }
    
}

