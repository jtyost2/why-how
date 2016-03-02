# Unit Testing: The Why and The How

## Justin Yost
## Web Developer at Loadsys

---

# Unit Testing

> Tests for the smallest possible unit of code.

---

# Unit Testing

> Firstly there is a notion that unit tests are low-level, focusing on a small part of the software system. Secondly unit tests are usually written these days by the programmers themselves using their regular tools - the only difference being the use of some sort of unit testing framework. Thirdly unit tests are expected to be significantly faster than other kinds of tests.
-- Martin Fowler

---

# Unit Testing

* Test and verify the intent and design of units of code, typically at the function/method level in PHP and C type languages.
* Unit tests are written in the same language you write your code in (though you may include a test framework).
* Should be fast, they shouldn't slow down your process for writing code.

---

# Unit Testing Goals

* Verify implementation of code matches the programmer's intent.
* Verify bugs are solved today and in the future (Regressions).
* Create better designed software.
* Improve Refactoring

---

# Why Unit Testing

* Can't I just manually test stuff?
* Isn't unit testing going to slow me down?
* No one cares?
* Business/Manager/Client/etc won't let me spend time on this stuff.

---

# Complaint: Manually Test

* Slow
* You write code not hitting refresh
* Computers do repetitive stuff really well
* You forget
* You make mistakes
* You are bad at remembering what you tested
* You are bad at communicating needed tests to other co-workers

---

# Complaint: Unit Testing is Slow

* Unit Testing is overall faster
* It may be slower in terms of pure speed to develop a thing
* Total Time to a reliable useful product is slower

---

# Research

> The results of the case studies indicate that the pre-release defect density of the four products decreased between 40% and 90% relative to similar projects that did not use the TDD practice. Subjectively, the teams experienced a 15–35% increase in initial development time after adopting TDD.
-- Realizing quality improvement through test driven development: results and experiences of four industrial teams
[http://research.microsoft.com/en-us/groups/ese/nagappan_tdd.pdf](http://research.microsoft.com/en-us/groups/ese/nagappan_tdd.pdf)

---

# Complaint: Unit Testing is Slow

* Unit Testing may be slower in the initial learning, phase, so is the new framework, so is the new language, so is everything
* The speed improvements in the long run will be worth it
* The short improvements in loss of defects will easily be worth it

---

# Complaint: Unit Testing is Slow

* What about for an MVP?

---

> Then you just have MP.
-- Andrew Lechowicz [Tweet](https://twitter.com/alecho_/status/704023025046462464)

---

# Complaint: Who Cares?

* Your customers care about quality
* Your boss/manager should care about quality

---

# Complaint: Who Cares?

* Unit testing isn't just fixing bugs that you observe
* it's about preventing bugs in the first place

---

# Complaint: No Time

* Microsoft Research
* If you have limited time then you should care even more, for any bugs are detrimental to your time

---

# General Theory of Unit Testing

* Unit Testing is writing code that proves what you did works
* Unit Testing means you stay in the flow of the code you are working on longer
* Unit Testing means you spend less time debugging and figuring out what went wrong
* Unit Testing means you spend time thinking through your code
* Unit Testing means you spend less time fixing stuff, more time building stuff

---

# General Theory of Unit Testing

* None of these may be perfect
* None of these may the right answer
* You should do it because you care about producing quality software
* If you don't learn now, what happens when you really need it?

---

# The Why

* It is faster
* It produces a better quality product
* It will make you a better developer/engineer

---

# The How

---

# PHPUnit

* A framework for writing unit tests
* Frameworks may have their own customizations

---

# PHPUnit Install

* Phar

```php
wget https://phar.phpunit.de/phpunit.phar
chmod +x phpunit.phar
sudo mv phpunit.phar /usr/local/bin/phpunit
```

---

# PHPUnit Install

* Composer

```php
composer require --dev phpunit/phpunit
```

---

# Test Pattern

* Arrange
* Act
* Assert

---

# Code Time

---

## Other Resources on Unit Testing?

* Grumpy Programmer: Chris Hartjes - https://grumpy-learning.com/

---

## Questions?

* twitter.com/jtyost2
* github.com/jtyost2
* yostivanich.com
* lynda.com/justinyost
