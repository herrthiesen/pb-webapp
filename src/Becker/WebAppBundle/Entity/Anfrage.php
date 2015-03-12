<?php
// src/Becker/WebAppBundle/Entity/Anfrage.php

namespace Becker\WebAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *Anfrage
 */
class Anfrage 
{
     /**
     * @var integer
     */
    protected $id;
    
    /**
     * @var integer
     */
    protected $buehne_id;
    
    /**
     * @var \DateTime
     */
    protected $anfrageDatum;
    
    /**
     * @var \DateTime
     */
    protected $mietenVom;
        
    /**
     * @var \DateTime
     */
    protected $mietenBis;
    
    
    /**
     * @var string
     */
    protected $kundeName;
    
    
    /**
     * @var string
     */
    protected $kundeFirma;
    
    
    /**
     * @var email
     */
    protected $kundeEmail;
    
    
    /**
     * @var string
     */
    protected $kundeTel;
    
    
    /**
     * @var text
     */
    protected $bemerkung;
        
     /**
     * @var text
     */
    protected $einsatzort;
    
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
     * Set buehne_id
     *
     * @param integer $buehne_id
     * @return Anfrage
     */
    public function setBuehne_id($buehne_id)
    {
        $this->buehne_id = $buehne_id;

        return $this;
    }

    /**
     * Get buehne_id
     *
     * @return integer 
     */
    public function getBuehne_id()
    {
        return $this->buehne_id;
    }
    
    /**
     * Set anfrageDatum
     *
     * @param \Datetime $anfrageDatum
     * @return Anfrage
     */
    public function setAnfrageDatum($anfrageDatum)
    {
        $this->anfrageDatum = $anfrageDatum;

        return $this;
    }

    /**
     * Get anfrageDatum
     *
     * @return \Datetime 
     */
    public function getAnfrageDatum()
    {
        return $this->anfrageDatum;
    }
    
        /**
     * Set mietenVom
     *
     * @param \Datetime $mietenVom
     * @return Anfrage
     */
    public function setMietenVom($mietenVom)
    {
        $this->mietenVom = $mietenVom;

        return $this;
    }

    /**
     * Get mietenVom
     *
     * @return \Datetime 
     */
    public function getMietenVom()
    {
        return $this->mietenVom;
    }
    
            /**
     * Set mietenBis
     *
     * @param \Datetime $mietenBis
     * @return Anfrage
     */
    public function setMietenBis($mietenBis)
    {
        $this->mietenBis = $mietenBis;

        return $this;
    }

    /**
     * Get mietenBis
     *
     * @return \Datetime 
     */
    public function getMietenBis()
    {
        return $this->mietenBis;
    }
    
              /**
     * Set kundeName
     *
     * @param string $kundeName
     * @return Anfrage
     */
    public function setKundeName($kundeName)
    {
        $this->kundeName = $kundeName;

        return $this;
    }

    /**
     * Get kundeName
     *
     * @return string 
     */
    public function getKundeName()
    {
        return $this->kundeName;
    }
    
     /**
     * Set kundeFirma
     *
     * @param string $kundeFirma
     * @return Anfrage
     */
    public function setKundeFirma($kundeFirma)
    {
        $this->kundeFirma = $kundeFirma;

        return $this;
    }

    /**
     * Get kundeFirma
     *
     * @return string 
     */
    public function getKundeFirma()
    {
        return $this->kundeFirma;
    }   
    
     /**
     * Set kundeEmail
     *
     * @param email $kundeEmail
     * @return Anfrage
     */
    public function setKundeEmail($kundeEmail)
    {
        $this->kundeEmail = $kundeEmail;

        return $this;
    }

    /**
     * Get kundeEmail
     *
     * @return email 
     */
    public function getKundeEmail()
    {
        return $this->kundeEmail;
    }   
    
   /**
     * Set kundeTel
     *
     * @param string $kundeTel
     * @return Anfrage
     */
    public function setKundeTel($kundeTel)
    {
        $this->kundeTel = $kundeTel;

        return $this;
    }

    /**
     * Get kundeTel
     *
     * @return string 
     */
    public function getKundeTel()
    {
        return $this->kundeTel;
    }  
    
    
        
   /**
     * Set bemerkung
     *
     * @param text $bemerkung
     * @return Anfrage
     */
    public function setBemerkung($bemerkung)
    {
        $this->bemerkung = $bemerkung;

        return $this;
    }

    /**
     * Get bemerkung
     *
     * @return text 
     */
    public function getBemerkung()
    {
        return $this->bemerkung;
    } 
    
    /**
     * Set einsatzort
     *
     * @param text $einsatzort
     * @return Anfrage
     */
    public function setEinsatzort($einsatzort)
    {
        $this->einsatzort = $einsatzort;

        return $this;
    }

    /**
     * Get einsatzort
     *
     * @return text 
     */
    public function getEinsatzort()
    {
        return $this->einsatzort;
    } 
}