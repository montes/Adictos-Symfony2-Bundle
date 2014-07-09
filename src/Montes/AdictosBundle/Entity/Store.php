<?php
// Montes/AdictosBundle/Entity/Store.php
 
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
     * @ORM\Column(type="string", length=255)
     */
    protected $url;
 
    /**
     * @ORM\Column(type="string", length=255)
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
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Store
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Store
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
     * Set clicks
     *
     * @param integer $clicks
     * @return Store
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;

        return $this;
    }

    /**
     * Get clicks
     *
     * @return integer 
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * Set validated
     *
     * @param boolean $validated
     * @return Store
     */
    public function setValidated($validated)
    {
        $this->validated = $validated;

        return $this;
    }

    /**
     * Get validated
     *
     * @return boolean 
     */
    public function getValidated()
    {
        return $this->validated;
    }

    /**
     * Set pcomments
     *
     * @param integer $pcomments
     * @return Store
     */
    public function setPcomments($pcomments)
    {
        $this->pcomments = $pcomments;

        return $this;
    }

    /**
     * Get pcomments
     *
     * @return integer 
     */
    public function getPcomments()
    {
        return $this->pcomments;
    }

    /**
     * Set ncomments
     *
     * @param integer $ncomments
     * @return Store
     */
    public function setNcomments($ncomments)
    {
        $this->ncomments = $ncomments;

        return $this;
    }

    /**
     * Get ncomments
     *
     * @return integer 
     */
    public function getNcomments()
    {
        return $this->ncomments;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Store
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Store
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Store
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add categories
     *
     * @param \Montes\AdictosBundle\Entity\Category $categories
     * @return Store
     */
    public function addCategory(\Montes\AdictosBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Montes\AdictosBundle\Entity\Category $categories
     */
    public function removeCategory(\Montes\AdictosBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
