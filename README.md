# prim
Formal and proper PHP micro-framework using League components.

This is more of an academic project than anything. My job has involved a fair amount of framework development over the past couple of years but I've not had the need (or really the opportunity) to build an MVC micro-framework before. To a certain degree I prefer to do things myself, so here we are.

This project is *very* young and likely to undergo significant changes. If you're looking for something bare bones that already has routing and dependency injection setup (and example files for controllers, services, and middleware) then this might be exactly what you're looking for. On the other hand, if you're looking for the next Symfony or Laravel, then this will leave you sorely disappointed.

---
### Installation

Installation is as simple as it gets:

```
git clone https://github.com/kendalltristan/prim.git
cd prim
composer install
```

---
### Architecture and Design

Prim is an attempt to do a lot of things more correctly than I've seen in many other projects through the years, most notably my own (and I've love to show them ones to you, but practically everything I've written in recent years is proprietary). You'll immediately notice that `strict_types` are declared everywhere and everything possible is type hinted. Also Prim tries to follow PSR-12 as closely as possible.

---
### Dependencies

Prim makes use of components from [The PHP League](https://thephpleague.com/), specifically [Container](https://container.thephpleague.com/), [Route](https://route.thephpleague.com/), and [Plates](http://platesphp.com/). Of those, Container and Route are hard dependencies whereas Plates is easily substituted for a templating engine of your choice. The only other hard dependencies are [PSR HTTP Message](https://github.com/php-fig/http-message) and [zend-httphandlerunner](https://docs.zendframework.com/zend-httphandlerrunner/). The latter is there for the emitter, but I may implement one within Prim to eliminate the dependency at some later point.

Prim also requires a PSR-7 implementation. Guzzle's is the default, but there are no problems swapping it out for any other. If you do so, modify or replace the `src/Factory/Psr7Factory.php` file to accommodate whichever implementation you decide to go with.
