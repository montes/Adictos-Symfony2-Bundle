<?php

namespace Montes\AdictosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     */
    protected $children;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * @ORM\Column(nullable="true")
     */
    protected $parent;

    /**
     * @ORM\ManyToMany(targetEntity="Store", mappedBy="categories")
     */
    protected $stores;

    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length="255", name="url_string", unique="true")
     */
    protected $urlString;

    public function __construct()
    {
        $this->stores = new \Doctrine\Commmon\Collections\ArrayCollection();
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
     * Set parent
     *
     * @param string $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return string $parent
     */
    public function getParent()
    {
        return $this->parent;
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
     * Set urlString
     *
     * @param string $urlString
     */
    public function setUrlString($urlString)
    {
        $this->urlString = $urlString;
    }

    /**
     * Get urlString
     *
     * @return string $urlString
     */
    public function getUrlString()
    {
        return $this->urlString;
    }

    /**
     * Add children
     *
     * @param Montes\AdictosBundle\Entity\Category $children
     */
    public function addChildren(\Montes\AdictosBundle\Entity\Category $children)
    {
        $this->children[] = $children;
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection $children
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add stores
     *
     * @param Montes\AdictosBundle\Entity\Store $stores
     */
    public function addStores(\Montes\AdictosBundle\Entity\Store $stores)
    {
        $this->stores[] = $stores;
    }

    /**
     * Get stores
     *
     * @return Doctrine\Common\Collections\Collection $stores
     */
    public function getStores()
    {
        return $this->stores;
    }
}