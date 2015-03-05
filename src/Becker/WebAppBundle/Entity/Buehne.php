<?php
// src/Becker/WebAppBundle/Entity/Buehne.php

namespace Becker\WebAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="buehne")
 */
class Buehne 
{
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $ahoehe;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $korblast;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $laenge;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $breite;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $hoehe;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $reichweite;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $stuetzbreite;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $hersteller;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $pdf;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    protected $img;
        
     /**
     * @ORM\Column(type="string", length=100)
     */
    protected $tag1;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $tag2;
    
         /**
     * @ORM\Column(type="string", length=100)
     */
    protected $tag3;
    
    /**
     * @ORM\ManyToOne(targetEntity="Kategorie", inversedBy="buehnen")
     * @ORM\JoinColumn(name="kategorie_id", referencedColumnName="id")
     */
    protected $kategorie;

    /**
     * @ORM\Column(type="string")
     */
    protected $created;
    
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
     * Set name
     *
     * @param string $name
     * @return Buehne
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set ahoehe
     *
     * @param string $ahoehe
     * @return Buehne
     */
    public function setAhoehe($ahoehe)
    {
        $this->ahoehe = $ahoehe;

        return $this;
    }

    /**
     * Get ahoehe
     *
     * @return string 
     */
    public function getAhoehe()
    {
        return $this->ahoehe;
    }

    /**
     * Set korblast
     *
     * @param string $korblast
     * @return Buehne
     */
    public function setKorblast($korblast)
    {
        $this->korblast = $korblast;

        return $this;
    }

    /**
     * Get korblast
     *
     * @return string 
     */
    public function getKorblast()
    {
        return $this->korblast;
    }

    /**
     * Set laenge
     *
     * @param string $laenge
     * @return Buehne
     */
    public function setLaenge($laenge)
    {
        $this->laenge = $laenge;

        return $this;
    }

    /**
     * Get laenge
     *
     * @return string 
     */
    public function getLaenge()
    {
        return $this->laenge;
    }

    /**
     * Set breite
     *
     * @param string $breite
     * @return Buehne
     */
    public function setBreite($breite)
    {
        $this->breite = $breite;

        return $this;
    }

    /**
     * Get breite
     *
     * @return string 
     */
    public function getBreite()
    {
        return $this->breite;
    }

    /**
     * Set hoehe
     *
     * @param string $hoehe
     * @return Buehne
     */
    public function setHoehe($hoehe)
    {
        $this->hoehe = $hoehe;

        return $this;
    }

    /**
     * Get hoehe
     *
     * @return string 
     */
    public function getHoehe()
    {
        return $this->hoehe;
    }

    /**
     * Set reichweite
     *
     * @param string $reichweite
     * @return Buehne
     */
    public function setReichweite($reichweite)
    {
        $this->reichweite = $reichweite;

        return $this;
    }

    /**
     * Get reichweite
     *
     * @return string 
     */
    public function getReichweite()
    {
        return $this->reichweite;
    }

    /**
     * Set stuetzbreite
     *
     * @param string $stuetzbreite
     * @return Buehne
     */
    public function setStuetzbreite($stuetzbreite)
    {
        $this->stuetzbreite = $stuetzbreite;

        return $this;
    }

    /**
     * Get stuetzbreite
     *
     * @return string 
     */
    public function getStuetzbreite()
    {
        return $this->stuetzbreite;
    }

    /**
     * Set hersteller
     *
     * @param string $hersteller
     * @return Buehne
     */
    public function setHersteller($hersteller)
    {
        $this->hersteller = $hersteller;

        return $this;
    }

    /**
     * Get hersteller
     *
     * @return string 
     */
    public function getHersteller()
    {
        return $this->hersteller;
    }

    /**
     * Set pdf
     *
     * @param string $pdf
     * @return Buehne
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * Get pdf
     *
     * @return string 
     */
    public function getPdf()
    {
        return $this->pdf;
    }
    
    

    /**
     * Set kategorie
     *
     * @param \AppBundle\Entity\Kategorie $kategorie
     * @return Buehne
     */
    public function setKategorie(\Becker\WebAppBundle\Entity\Kategorie $kategorie = null)
    {
        $this->kategorie = $kategorie;

        return $this;
    }

    /**
     * Get kategorie
     *
     * @return \AppBundle\Entity\Kategorie 
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }    

    /**
     * Set img
     *
     * @param string $img
     * @return Buehne
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set tag1
     *
     * @param string $tag1
     * @return Buehne
     */
    public function setTag1($tag1)
    {
        $this->tag1 = $tag1;

        return $this;
    }

    /**
     * Get tag1
     *
     * @return string 
     */
    public function getTag1()
    {
        return $this->tag1;
    }

    /**
     * Set tag2
     *
     * @param string $tag2
     * @return Buehne
     */
    public function setTag2($tag2)
    {
        $this->tag2 = $tag2;

        return $this;
    }

    /**
     * Get tag2
     *
     * @return string 
     */
    public function getTag2()
    {
        return $this->tag2;
    }

    /**
     * Set tag3
     *
     * @param string $tag3
     * @return Buehne
     */
    public function setTag3($tag3)
    {
        $this->tag3 = $tag3;

        return $this;
    }


    /**
     * Get tag3
     *
     * @return string 
     */
    public function getTag3()
    {
        return $this->tag3;
    }
    
    
    /**
     * Get created
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }
    
    /**
     * Set created
     * 
     * @param string $created
     * @return Buehne
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }
    
}
