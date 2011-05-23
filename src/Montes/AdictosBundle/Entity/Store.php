<?php

namespace Montes\AdictosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Store
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Category")
     * @ORM\JoinTable(name="stores_categories",
     *      joinColumns={@ORM\JoinColumn(name="store_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")})
     */
    protected $categories;

    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $url;

    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $clicks = 0;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $validated = false;

    /**
     * @ORM\Column(type="integer")
     */
    protected $pcomments = 0;

    /**
     * @ORM\Column(type="integer")
     */
    protected $ncomments = 0;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $active = false;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }


    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set clicks
     *
     * @param integer $clicks
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;
    }

    /**
     * Get clicks
     *
     * @return integer $clicks
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * Set validated
     *
     * @param boolean $validated
     */
    public function setValidated($validated)
    {
        $this->validated = $validated;
    }

    /**
     * Get validated
     *
     * @return boolean $validated
     */
    public function getValidated()
    {
        return $this->validated;
    }

    /**
     * Set pcomments
     *
     * @param integer $pcomments
     */
    public function setPcomments($pcomments)
    {
        $this->pcomments = $pcomments;
    }

    /**
     * Get pcomments
     *
     * @return integer $pcomments
     */
    public function getPcomments()
    {
        return $this->pcomments;
    }

    /**
     * Set ncomments
     *
     * @param integer $ncomments
     */
    public function setNcomments($ncomments)
    {
        $this->ncomments = $ncomments;
    }

    /**
     * Get ncomments
     *
     * @return integer $ncomments
     */
    public function getNcomments()
    {
        return $this->ncomments;
    }

    /**
     * Set active
     *
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return boolean $active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add categories
     *
     * @param Montes\AdictosBundle\Entity\Category $categories
     */
    public function addCategories(\Montes\AdictosBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;
    }

    /**
     * Get categories
     *
     * @return Doctrine\Common\Collections\Collection $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }
}