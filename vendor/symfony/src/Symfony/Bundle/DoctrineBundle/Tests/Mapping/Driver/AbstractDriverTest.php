<?php

namespace Symfony\Bundle\DoctrineBundle\Tests\Mapping\Driver;

abstract class AbstractDriverTest extends \PHPUnit_Framework_TestCase
{
    public function testFindMappingFile()
    {
        $driver = $this->getDriver(array(
            'MyNamespace\MyBundle\EntityFoo' => 'foo',
            'MyNamespace\MyBundle\Entity' => $this->dir,
        ));

        touch($filename = $this->dir.'/Foo'.$this->getFileExtension());
        $this->assertEquals($filename, $this->invoke($driver, '_findMappingFile', array('MyNamespace\MyBundle\Entity\Foo')));
    }

    public function testFindMappingFileInSubnamespace()
    {
        $driver = $this->getDriver(array(
            'MyNamespace\MyBundle\Entity' => $this->dir,
        ));

        touch($filename = $this->dir.'/Foo.Bar'.$this->getFileExtension());
        $this->assertEquals($filename, $this->invoke($driver, '_findMappingFile', array('MyNamespace\MyBundle\Entity\Foo\Bar')));
    }

    public function testFindMappingFileNamespacedFoundFileNotFound()
    {
        $this->setExpectedException(
            'Doctrine\ORM\Mapping\MappingException',
            "No mapping file found named '".$this->dir."/Foo".$this->getFileExtension()."' for class 'MyNamespace\MyBundle\Entity\Foo'."
        );

        $driver = $this->getDriver(array(
            'MyNamespace\MyBundle\Entity' => $this->dir,
        ));

        $this->invoke($driver, '_findMappingFile', array('MyNamespace\MyBundle\Entity\Foo'));
    }

    public function testFindMappingNamespaceNotFound()
    {
        $this->setExpectedException(
            'Doctrine\ORM\Mapping\MappingException',
            "No mapping file found named 'Foo".$this->getFileExtension()."' for class 'MyOtherNamespace\MyBundle\Entity\Foo'."
        );

        $driver = $this->getDriver(array(
            'MyNamespace\MyBundle\Entity' => $this->dir,
        ));

        $this->invoke($driver, '_findMappingFile', array('MyOtherNamespace\MyBundle\Entity\Foo'));
    }

    protected function setUp()
    {
        $this->dir = sys_get_temp_dir().'/abstract_driver_test';
        @mkdir($this->dir, 0777, true);
    }

    protected function tearDown()
    {
        $iter = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->dir), \RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($iter as $path) {
            if ($path->isDir()) {
                @rmdir($path);
            } else {
                @unlink($path);
            }
        }

        @rmdir($this->dir);
    }

    abstract protected function getFileExtension();
    abstract protected function getDriver(array $paths = array());

    private function setField($obj, $field, $value)
    {
        $ref = new \ReflectionProperty($obj, $field);
        $ref->setAccessible(true);
        $ref->setValue($obj, $value);
    }

    private function invoke($obj, $method, array $args = array()) {
        $ref = new \ReflectionMethod($obj, $method);
        $ref->setAccessible(true);

        return $ref->invokeArgs($obj, $args);
    }
}