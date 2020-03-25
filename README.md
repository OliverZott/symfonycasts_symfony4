# Symfony 4 - Project
source: https://symfonycasts.com/screencast/symfony4

## Setup
### Setting Up the Project:
(Chapter 1 / 2)

* **Create project**
    * `~$ composer create-project symfony/skeleton the_spacebar4.4`
    * This command clones the symfony/skeleton project and then runs composer install to download its dependencies ("recipes" are a new and very important concept)


* **Switch to new project director and start build-in server**
    * `~$ cd the_spacebar4.4`
    * `~$ symfony server:start`

* **Initialize Git-repository** (in project folder)
    * `~$ git init `
    * (if using phpstorm, ignore .idea): https://help.github.com/en/github/using-git/ignoring-files
    * `git remote add origin https://github.com/.../symfonycasts_symfony4.git`
    * `~$ git add .`
    * `~$ git commit -m "comment"` 

* **Update web-server bundle / start build-in server**
    * `~$ composer require symfony/web-server-bundle 4.4 --dev`    
    (optional "4.4" for symfony version)
    * `~$ ./bin/console server:run` or `~$ symfony server:start`
    
### Setting Up PhpStorm
* Install Plugins
    * Symfony Support
    * PHP Annotations
    * PHP Toolbox
    
* Settings: Language & Frameworks > PHP > Symfony  --> Enable Plugins for thisProject
* Settings: Language & Frameworks > PHP > Composer --> Check if composer.json path is set



## Routes & Controller
* **Route** ...configuration that defines the URL for a page.
* **Controller** ... a function that we write that actually builds the content for that page.

* Version 1:
    * /config/*routes.yaml*  ... `App\Controller\ArticleController::homepage`
    * /src/Controller/ ...create class `ArticleController.php` with:
        * `namespace App\Controller;`
        * `use Symfony\Component\HttpFoundation\Response;`
        * function `homepage()` with `return new Response`
        
* Version 2:
    * install annotations `~$ composer require annotations`
    * no yaml needed anymore, instead: `/** @Route("/") */`
    * General route: `@Route("/news/{slug}")`
    
* Next with Routes: 
    * match regex
    * http requests
    * host names

## Flex & Recipes

## Components
#### /bin/console
`./bin/console`