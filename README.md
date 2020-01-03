# Prim
Formal and proper PHP micro-framework using League components.

This is more of an academic project than anything. My job has involved a fair amount of framework development over the past couple of years but I've not had the need (or really the opportunity) to roll my own micro-framework before. To a certain degree I prefer to have the opportunity to do things myself, so here we are.

This project is *very* young and likely to undergo changes. If you're looking for something bare bones that already has routing and dependency injection setup (with example files for controllers, services, and middleware) then this might be exactly what you're looking for. On the other hand, if you're looking for the next Symfony or Laravel, then this will leave you sorely disappointed.

---
### Installation

Installation is as simple as it gets:

```
git clone https://github.com/PrimFramework/framework.git
cd framework
composer install
```

When setting up your web server, point it to the `public` directory. All requests need to go through the `public/index.php` file. There's an `.htaccess` file that does this for enabled web servers, but you may want to delete it and handle it directly in the server configuration.

---
### Design

Prim is an attempt to do a lot of things more correctly than I've seen in many other projects through the years, most notably my own (and I've love to show them ones to you, but practically everything I've written in recent years is proprietary). You'll immediately notice that `strict_types` are declared everywhere and everything possible is type hinted. Also Prim tries to follow PSR-12 as closely as possible.

The aim is to have a *prim and proper* framework that makes it easy to adhere to modern standards and clean architectural principles. As such, no decisions have been made for you regarding things like data persistence. Also, it's expected that your business logic should exist in your own components and that Prim should primarily be used as a means of wiring everything together.

---
### Dependencies

Prim makes use of components from [The PHP League](https://thephpleague.com/), specifically [Container](https://container.thephpleague.com/), [Route](https://route.thephpleague.com/), and [Plates](http://platesphp.com/). Of those, Container and Route are hard dependencies whereas Plates is easily substituted for a templating engine of your choice.

Prim also depends on its own [prim/httpfactory](https://packagist.org/packages/prim/httpfactory) component which includes all of the PSR-17 factory methods as well as methods for generating SAPI emitters and PSR-18 HTTP clients.

---
### Usage

Coming soon...
