<?php
namespace src\app\Demo\DIC;

use ReflectionClass;
use ReflectionException;
use src\app\Controller\SkillController;

class DIC {

    /**
     * @var $registry array - Tableau sauvegardant les dépendances
     */
    public $registry = [];
    /**
     * @var $factories array - Tableau sauvegardant les dépendances (Factory)
     */
    public $factories = [];
    /**
     * @var $instances array - Tableau sauvegardant les dépendances (Singleton)
     */
    public $instances = [];

    /**
     * @param string $classname
     * @param array $parameters
     * @return void
     */
    //public function set($key, Callable $resolver) {
    //    $this->registry[$key] = $resolver;
    //}
    public function set(string $classname, array $parameters = []): void
    {
        // TODO install xdebug or Php debug bar
        if(!isset($this->registry[$classname])) {
            $this->registry[$classname] = (function() use ($classname, $parameters) {
                $class = new ReflectionClass($classname);
                return $class->newInstance();
            });
        }
    }

    /**
     * Sauvegarde les dépendances dans le tableau $factories (Factory)
     * @param $key string Nom de la classe
     * @param $resolver callable Fonction
     */
    public function setFactory($key, Callable $resolver) {
        $this->factories[$key] = $resolver;
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
            if(isset($this->registry[$key])) {
                $this->instances[$key] = $this->registry[$key]();
            } else
            {
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
        }
        return $this->instances[$key];        
    }

  public function getFactory($key)
  {
    if(isset($this->factories[$key])){
      return $this->factories[$key]();
    }
    return null;
  }  

}
