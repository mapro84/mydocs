<?php
namespace src\app\Demo\Docker;

use src\app\Demo\Docker\Docker;
use src\Core\Html\BootstrapHtml;

class Demo {

    private $factory;

    public static function demo(){

    	$docker = new Docker();

        $bootstrapHtml = new BootstrapHtml('div','col demoBody', true);

        $bootstrapHtml->addTitle('Class docker:');
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Docker/Docker.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('Code Usage:');
        $data = '
        // Images containers list
        docker images

        // list of actives containers
        docker ps

        // Work into an image
        docker run -it debian

        // diff in a second window, ContainerID still working
        docker diff 22d (Begining of ContainerID)

        // Create image copy (if modifications, in a second window)
        docker commit ContainerID ContainerID-customized
        ==> ContainerID-customized will contain modifications

        // to keep modifications
        docker commit ContainerID

        // save an image locally
        docker save ubuntu-test > /var/www/html/ubuntu-test.tar

        // Launch an installed app with -port [local-container] ==> localhost:8000
        docker run -p 8000:80 tutum/wordpress

        // Interact with content in local machine
        // --name : name instead ContainerID  -d en tache de font
        docker run --name some-ghost -p 8080:2368 -v /var/wwww/html/ghost:/var/lib/ghost -d ghost
        ';
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('DOCKER COMPOSE');
        $data = '
        // Build image 
        docker-compose build

        // Build and run image
        docker-compose up

        // Build image and runs in background
        // Container keeps active
        docker-compose up -d

        // Process list
        docker-compose ps

        // Start Service Containers
        docker-compose start

        // Stop Service Containers
        docker-compose stop

        // Delete services
        docker-compose rm

        // Increase instances of a service
        docker-compose scale [SERVICE]=3

        // Update Service
        docker-compose pull

        ';
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();


        $bootstrapHtml->endData();
        return $bootstrapHtml->getData();



    }
    
}

