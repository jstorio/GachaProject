# GachaProject
A browser based gacha system that rewards you with characters and equipment simply just by browsing the interwebs!

# Introduction
I am very fond of the gacha system and I really like how the concept plays on the psychology of the human mind. Getting something out of a percentage chance gives someone the thrill of anticipation, making you (the player) hope for something worth your while. It is very much like gambling, but you can tweak the values to reward everyone who takes a chance (even though it's not as valuable as the top prize). The system is widely used on a lot of mobile games namely Fire Emblem Heroes and Brave Frontier, but sometimes you just want the system, not the gameplay.

# The Project
This project will be based solely on the gacha system alone, stripping everything around it such as the gameplay and monetization. The system will be the core of this project, focusing more on the probability algorithms (more on that later), and the inclusion of the actual items themselves, ranging from characters with deep lore to weapons that you can equip them with. The currency, or currency generation, will be linked to a home-brew browser extension that uses javascript APIs (more on that later as well) that tracks browser actions.

# Approach / Technologies
I am aiming to develop everything using MEAN as my main software stack. This will be my very first project utilizing a stack of javascript-based technologies.

# Probability Algorithm and Calculation
The JS algorithm will be based on Math.Random() in determining a random roll. As it currently stands, the code is written in PHP and uses mt_rand().

While mt_rand() seems sufficient enough to generate random integers from 1-100 (denoting 1-100%), there is 1 problem: mt_rand() cannot generate decimals. In order to at least recognize the first decimal figure, I have to multiply the maximum range by 10 hence: 1-1000. This way, a probability chance of 2.5% can be represented as 25.

Here is an example output of the gacha_algorithm.php:

```
You rolled 24 times and got an Extremely Rare roll!
Winning Roll: 76
Range: 110 - 26

RATES:
Common: 48.4% 
Uncommon: 23.4% 
Rare: 13.4% 
Very Rare: 3.4% 
Extremely Rare: 8.4%
```

I am sure there are more efficient ways to get a workaround on this on the PHP side, but I hope I could find a comprehensive Random function library for JS and use that instead.

# Design Choices and Implementation
There will be 2 main parts of the project:
- Browser
- Web App

## Browser
A browser extension will be needed to fully use the application. In the early stages of development, the extension will be using 2 Javascript APIs namely: WebNavigation and BrowserAction. These APIs will be used to track user browser activities such as loading webpages, returning/back, clicking links, etc. Every action will generate currency which can then be used on the Web App.

- As of the moment, browser extension is only planned for Mozilla Firefox.
- The extension will **NOT** store any data nor collect any information whatsoever. It will only generate currency/integer value for every triggered browser action.
- Additional JS APIs are planned for future releases such as: Bookmarks, Downloads, Menus, Notifications, and SidebarAction.

## Web App
The webapp will be accessible via a desktop browser or a mobile browser. It will be responsive in design and is focused more on mobile usability. This is where everything can be configured from the account settings, to the main gacha system. 
