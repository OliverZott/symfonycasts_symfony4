# Symfony 4 - Project
Tutorial source: https://symfonycasts.com/screencast/symfony4

Best practice: https://symfony.com/doc/current/best_practices.html

## Symfony 4 - Structure

+ `bin/` ...The famous bin/console file lives here 

+ `config/` ...Contains configurations to configure routes, services and packages.
    + `config/bundles.php`  ...plugin system for symfony (flex adds 3rd party plugins there) 
    + `config/packages/` ...
+ `public/` ...This is the document root for your project: you put any publicly accessible files here.

+ `src/` ....All PHP code lives here.
    + `src/Controller`  ...function that that actually builds content for that page

+ `templates/` ...All Twig templates live here (templates organize and render html)

+ `var/` ...This is where automatically-created files are stored, 
      like cache files (var/cache/) and logs (var/log/).
      
+ `vendor/` ...Third-party (i.e. "vendor") libraries live here! 
      These are downloaded via the Composer package manager.
      
## Symfony 4 - Tools
Each tool brings various **packages** and **recipes**! Installed with **Flex** (see below).

`composer require  `

* `web-server-bundle`
* `annotations` 
* `sec-checker` 
* `twig` 
* `profiler` 

## Setup
### Setting Up the Project:

* **Create project**
    * `~$ composer create-project symfony/skeleton the_spacebar4.4`
    * This command clones the symfony/skeleton project and then runs composer install to download its 
    dependencies ("recipes" are a new and very important concept)


* **Switch to new project director and start build-in server**
    * `~$ cd the_spacebar4.4`
    * `~$ symfony server:start`

* **Git: Initialize repository** (in project folder)
    * `~$ git init `
    * (if using phpstorm, ignore .idea): https://help.github.com/en/github/using-git/ignoring-files
    * `git remote add origin https://github.com/.../symfonycasts_symfony4.git`
    * `~$ git add .`
    * `~$ git commit -m "comment"` 

* **Update web-server bundle / start build-in server**
    * `~$ composer require symfony/web-server-bundle 4.4 --dev`    
    (optional "4.4" for symfony version)
    * `~$ ./bin/console server:run` or `~$ symfony server:start`
    
* **Git: Check changes after tools are installed** (assure git up-to-date before)  
    * `~$ git diff --name-only` (e.g.: composer.json)
    * `~$ git diff composer.json`  
    
    
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
    * MUST return symfony **Response Object** (can be anything)

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

## Flex & Recipes / Aliases
https://symfony.com/doc/current/quick_tour/flex_recipes.html
* Symfony **Flex** (https://flex.symfony.com/)
    * uses **Alias** system
    * installs recipes
    
**Flex** is a tool that makes adding new features as simple as running one command. It's also the reason why 
Symfony is ideal for a small micro-service or a huge application.
    
    
Flex installs **recipes** (e.g. for symfony/twig-bundle). A **recipe** is a way for a library 
to automatically configure itself by adding and modifying files. Thanks to recipes, adding features is 
seamless and automated: install a package and you're done!


####Example: security-checker
https://packagist.org/packages/sensiolabs/security-checker

`~$ composer require sec-checker --dev` ...Install security checker (--dev because only used while developing)


`~$ ./bin/console security:check` ...using recipe in CLI

`~$ git diff composer.json`  ... check what composer added (see scripts)

`~$ composer install`        ... "composer install" now always checks security!
 
( alternative - doesn't need PHP: `~$ symfony security:check` )


## Twig

**Template Engine**:  https://twig.symfony.com/

https://symfony.com/doc/current/quick_tour/flex_recipes.html

https://symfony.com/doc/current/templates.html#rendering-templates

+ Tool to return **html-response** in controller function.
+ **Templates** in Symfony are created with Twig: a flexible, fast, and secure template engine.  
(Templates are the best way to organize and render HTML from inside application)

+ Install: `~$ composer require twig`; Files/Folders created by *Flex*:
    + */config/bundles.php* ...Plugin added by Flex
    + */templates/*  ...This is the directory where template files will live. The recipe also added a 
    "*base.html.twig*" layout file.
    + */config/packages/twig.yaml* ...Configuration file that sets up Twig with sensible defaults.

+ Twig-Syntax:
    + {{ }}  ...print something: (either variable, string or complexer expression)
    + {% %} ...do something: e.g. statements (if, while, for ...)
    + {# #} ... comments
    
Template-Engine vs. Web-Framework: 
https://stackoverflow.com/questions/3139924/what-are-the-differences-between-framework-and-template-engine

## Profiler

+ Install: `~$ composer require profiler`;

Functionality:
+ `dump()` 
    + in .php: `dump($slug, $this);` 
    + in .twig: `dump()`  ...prints all accessible variables 

## Packs


## Components
#### /bin/console
`./bin/console`