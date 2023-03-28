<?php

namespace src\Core\DIC;

use ReflectionClass;
use ReflectionException;
use src\app\Controller\SkillController;

class DIC {

    /**
     * @var $instances array - Tableau sauvegardant les dépendances (Singleton)
     */
    public array $instances = [];

    /**
     * @throws ReflectionException
     */
    public function set(string $classname, array $parameters = []): void
    {
        if(!isset($this->instances[$classname])) {
            $class = new ReflectionClass($classname);
            $instance = $class->newInstance();
            $this->instances[$classname] = $instance;
        }
    }

    /**
     * Sauvegarde les dépendances dans le tableau $instances (Singleton)
     * @throws ReflectionException
     */
    public function setInstance($instance): void
    {
        $reflection = new ReflectionClass($instance);
        $this->instances[$reflection->getName()] = $instance;
    }

    /**
     * Permet de récupérer les dépendances pour créer un singleton
     * @throws ReflectionException
     */
    public function getInstance($key) {
        if(!isset($this->instances[$key])) {
            echo '<br>  no isset instances[key]  ';
            $reflected_class = new ReflectionClass($key);
            if($reflected_class->isInstantiable()) {
                $constructor = $reflected_class->getConstructor();
                if($constructor) {
                    $parameters = $constructor->getParameters();
                    $constructor_parameters = [];
                    foreach($parameters as $parameter) {
                        if($parameter->getType()) {
                            $constructor_parameters[] = $this->getInstance($parameter->getType()->getName());
                        }
                        else {
                            $constructor_parameters[] = $parameter->getName();
                        }
                    }
                    $this->instances[$key] = $reflected_class->newInstanceArgs($constructor_parameters);
                }
                else {
                    $this->instances[$key] = $reflected_class->newInstance();
                }
            }
            else {
                throw new \Exception('"'.$key.'" is not an instantiable class');
            }
        }

        var_dump($this->instances[$key]);

        return $this->instances[$key];
    }

}
