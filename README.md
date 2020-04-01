# Symfony 4 - Project
Tutorial source: https://symfonycasts.com/screencast/symfony4

Best practice: https://symfony.com/doc/current/best_practices.html

## Table of Contents
1. [Structure](#structure)
2. [Tools](#tools)
3. [Setup](#setup)
4. [Routes & Controller](#route)
5. [Flex & Recipes / Aliases](#flex)
6. [Twig](#twig)
7. [Profiler-Pack](#profiler)
8. [Debug-Packs](#debug)
9. [Packs](#packs)
9. [Assets](#assets)
9. [Generating URLs](#urls)



## Symfony 4 - Structure <a name="structure"></a>

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
      
## Symfony - Tools <a name="tools"></a>
Each tool brings various **packages** and **recipes**! Installed with **Flex** (see below).

Install: `composer require  ` ...

* `web-server-bundle`
* `annotations` 
* `sec-checker` 
* `twig` 
* `profiler` 
* `debug`
* `asset`

Check CLI commands:
* `~$ php bin/console`

Check debug:
* `~$ ./bin/console debug:`

## Setup <a name="setup"></a>
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



## Routes & Controller <a name="route"></a>
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

## Flex & Recipes / Aliases <a name="flex"></a>
https://symfony.com/doc/current/quick_tour/flex_recipes.html
* Symfony **Flex** (https://flex.symfony.com/)
    * uses **Alias** system
    * installs recipes
    
**Flex** is a tool that makes adding new features as simple as running one command. It's also the reason why 
Symfony is ideal for a small micro-service or a huge application.
    
**Recipes** are executed by Flex to install and configure files automatically! (e.g. config/packages/...)    
    
Flex installs **recipes** (e.g. for symfony/twig-bundle). A **recipe** is a way for a library 
to automatically configure itself by adding and modifying files. Thanks to recipes, adding features is 
seamless and automated: install a package and you're done!


#### Example: security-checker <a name="sec"></a>
https://packagist.org/packages/sensiolabs/security-checker

`~$ composer require sec-checker --dev` ...Install security checker (--dev because only used while developing)


`~$ ./bin/console security:check` ...using recipe in CLI

`~$ git diff composer.json`  ... check what composer added (see scripts)

`~$ composer install`        ... "composer install" now always checks security!
 
( alternative - doesn't need PHP: `~$ symfony security:check` )


## Twig <a name="twig"></a>

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

## Profiler-Pack <a name="profiler"></a>
+ Install: `~$ composer require profiler`;

Functionality:
+ `dump()` 
    + in .php: `dump($slug, $this);` 
    + in .twig: `{{ dump() }}`  ...prints all accessible variables 

## Debug-Pack  <a name="debug"></a>
https://github.com/symfony/debug-pack/blob/master/composer.json
+ Install: `~$ composer require debug`;
+ Components:
    + monolog ...logging lib
    + phpunit-bridge ...unit testing lib
    + profiler (see above)
    
## Packs <a name="packs"></a>
**Packs** ... packages that install other libraries at once. 
See packages above (especially respective **composer.json** files)

**Disadvantage** of packs: No version control over single libs / packages contained by the pack.

Use `unpack` to replace pack by its components:

+ e.g.: `~$ composer unpack debug` 

before: 

```
"require-dev": {
    "symfony/debug-pack": "^1.0",
    "symfony/profiler-pack": "^1.0",
    "symfony/web-server-bundle": "4.4"
```

after:

```
"require-dev": {
    "easycorp/easy-log-handler": "^1.0.7",
    "symfony/debug-bundle": "*",
    "symfony/monolog-bundle": "^3.0",
    "symfony/profiler-pack": "*",
    "symfony/var-dumper": "*",
    "symfony/web-server-bundle": "4.4"
```


## Assets <a name="assets"></a>
The Asset component manages URL generation 
and versioning of web assets such as CSS stylesheets, JavaScript files and image files.

https://symfony.com/doc/current/components/asset.html

+ Install: `composer require asset`;

+ Templates (`/templates`):
    + Overwrite **base.html.twig** file with tutorial-version
    + `~$ rm -rf var/cache/dev/*` ...copied tutorial-file date older then mine -> Symfony recognized that!

+ Public (`/public/`: css, fonts, images (formerly `/web/`)

+ **webpack-encore** ...Symfony tool!

## Routes: Generating URLs <a name="urls"></a>
Show list of all routes in app:
`~$ ./bin/console debug:router`

+ Annotation routes automatically named (e.g.: `app_article_homepage`)
+ use `{{ path('app_article_homepage') }}`

+ **Controller**
    + ` @Route("/")`  --> `return $this->render('article/homepage.html.twig');`
    + `@Route("/news/{slug}", name="article_show")` --> `return $this->render('article/show.html.twig', array(...`
   
+ **base.html.twig**
    + `href="{{ asset('css/styles.css') }}`
    + `href="{{ asset('css/font-awesome.css') }}`
    + `src="{{ asset('images/astronaut-profile.png') }}`
    + link to homepage.html.twig: `href="{{ path('app_article_homepage') }}`
    
+ **homepage.html.twig**
    + link to show.html.twig: `href="{{ path('article_show', { slug:'why-asteroids-taste-like-bacon'}) }}`

+ **show.html.twig**
    + `{% for comment in comments %}` ... `{% endfor %}`
    
## JavaScript & Page-Specific Assets
+ JS which sends AJAX request to API endpoint
+ Endpoint returns current count and updates page
+ JQuery in **base.html.twig**; Hearts in **show.html.twig**

**show.html.twig**
 + `<span class="js-like-article-count">5</span>`
 
**article_show.js**
    
## JSON API Endpoint
https://symfonycasts.com/screencast/symfony4/javascript-api#play

Endpoint will modify something on server (like article) --> BestPractice: NO Get Request (only POST):
+ Check routes: `~$ ./bin/console debug:router`

**ArticleController.php** 
+ new file: `public function toggleArticleHeart($slug)`
+ `@Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})`

**show.html.twig** 
+ `href="{{ path('article_toggle_heart', {slug: slug}) }}"`
    
**article_show.js**

    
## Services
**Services** ...Objects, that do work. Examples:
+ Router Object --> matches routes & generates URLs
+ twig object --> renders templates
+ logger object --> stores log in var/log/dev.log

### Logging:
`~$ tail -f var/log/dev.log`
