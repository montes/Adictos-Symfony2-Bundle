<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\DoctrineBundle;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\DBAL\Connection;

/**
 * References all Doctrine connections and entity managers in a given Container.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Registry
{
    private $container;
    private $connections;
    private $entityManagers;
    private $defaultConnection;
    private $defaultEntityManager;

    public function __construct(ContainerInterface $container, array $connections, array $entityManagers, $defaultConnection, $defaultEntityManager)
    {
        $this->container = $container;
        $this->connections = $connections;
        $this->entityManagers = $entityManagers;
        $this->defaultConnection = $defaultConnection;
        $this->defaultEntityManager = $defaultEntityManager;
    }

    /**
     * Gets the default connection name.
     *
     * @return string The default connection name
     */
    public function getDefaultConnectionName()
    {
        return $this->defaultConnection;
    }

    /**
     * Gets the named connection.
     *
     * @param string $name The connection name (null for the default one)
     *
     * @return Connection
     */
    public function getConnection($name = null)
    {
        if (null === $name) {
            $name = $this->defaultConnection;
        }

        if (!isset($this->connections[$name])) {
            throw new \InvalidArgumentException(sprintf('Doctrine Connection named "%s" does not exist.', $name));
        }

        return $this->container->get($this->connections[$name]);
    }

    /**
     * Gets all connection names.
     *
     * @return array An array of connection names
     */
    public function getConnectionNames()
    {
        return $this->connections;
    }

    /**
     * Gets the default entity manager name.
     *
     * @return string The default entity manager name
     */
    public function getDefaultEntityManagerName()
    {
        return $this->defaultEntityManager;
    }

    /**
     * Gets a named entity manager.
     *
     * @param string $name The entity manager name (null for the default one)
     *
     * @return EntityManager
     */
    public function getEntityManager($name = null)
    {
        if (null === $name) {
            $name = $this->defaultEntityManager;
        }

        if (!isset($this->entityManagers[$name])) {
            throw new \InvalidArgumentException(sprintf('Doctrine EntityManager named "%s" does not exist.', $name));
        }

        return $this->container->get($this->entityManagers[$name]);
    }

    /**
     * Resets a named entity manager.
     *
     * This method is useful when an entity manager has been closed
     * because of a rollbacked transaction AND when you think that
     * it makes sense to get a new one to replace the closed one.
     *
     * Be warned that you will get a brand new entity manager as
     * the existing one is not useable anymore. This means that any
     * other object with a dependency on this entity manager will
     * hold an obsolete reference. You can inject the registry instead
     * to avoid this problem.
     *
     * @param string $name The entity manager name (null for the default one)
     *
     * @return EntityManager
     */
    public function resetEntityManager($name = null)
    {
        if (null === $name) {
            $name = $this->defaultEntityManager;
        }

        if (!isset($this->entityManagers[$name])) {
            throw new \InvalidArgumentException(sprintf('Doctrine EntityManager named "%s" does not exist.', $name));
        }

        // force the creation of a new entity manager
        // if the current one is closed
        $this->container->set($this->entityManagers[$name], null);
    }

    /**
     * Gets all connection names.
     *
     * @return array An array of connection names
     */
    public function getEntityManagerNames()
    {
        return $this->entityManagers;
    }
}
