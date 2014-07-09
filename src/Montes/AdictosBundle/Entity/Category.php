<?php
// Montes/AdictosBundle/Entity/Category.php
 
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
     * @ORM\Column(nullable=true)
     */
    protected $parent;
 
    /**
     * @ORM\ManyToMany(targetEntity="Store", mappedBy="categories")
     */
    protected $stores;
 
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;
 
    /**
     * @ORM\Column(type="string", length=255, name="url_string", unique=true)
     */
    protected $urlString;
 
    public function __construct()
    {
        $this->stores = new \Doctrine\Commmon\Collections\ArrayCollection();
    }

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
     * Set parent
     *
     * @param string $parent
     * @return Category
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return string 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
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
     * Set urlString
     *
     * @param string $urlString
     * @return Category
     */
    public function setUrlString($urlString)
    {
        $this->urlString = $urlString;

        return $this;
    }

    /**
     * Get urlString
     *
     * @return string 
     */
    public function getUrlString()
    {
        return $this->urlString;
    }

    /**
     * Add children
     *
     * @param \Montes\AdictosBundle\Entity\Category $children
     * @return Category
     */
    public function addChild(\Montes\AdictosBundle\Entity\Category $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Montes\AdictosBundle\Entity\Category $children
     */
    public function removeChild(\Montes\AdictosBundle\Entity\Category $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add stores
     *
     * @param \Montes\AdictosBundle\Entity\Store $stores
     * @return Category
     */
    public function addStore(\Montes\AdictosBundle\Entity\Store $stores)
    {
        $this->stores[] = $stores;

        return $this;
    }

    /**
     * Remove stores
     *
     * @param \Montes\AdictosBundle\Entity\Store $stores
     */
    public function removeStore(\Montes\AdictosBundle\Entity\Store $stores)
    {
        $this->stores->removeElement($stores);
    }

    /**
     * Get stores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStores()
    {
        return $this->stores;
    }
}
