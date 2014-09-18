pingu-track
===========
Light Linux Monitor dashboard in combination with HTML+PHP+JS.

![ScreenShot](/img/pingu-track-screenshot.png)

Currently included widgets:
* System information
* Network
* Process usage
* Disk space
* Memory usage
* Bandwidth
* Last logged in
* Fast stats
* Ping option

More widgets and functionalities will be added over time.

#Installation

* Install Apache and PHP5
* Put /pingu-track folder into /var/www
* If needed, chmod -R +x /var/www/pingu-track
* For each widget you can change its dimensions and positions with data-row="x" data-col="x" data-sizex="x" data-sizey="x"
* Number of grid columns and rows can be changed in /gridster/grid-positions.js
* Widgets are draggable.
* Positions of widget are storing to a local browser storage.
* Modify linux commands according to your needs in index.php

Credits goes to <a href="http://gridster.net/">Gridster<a>,<a href="http://getbootstrap.com">Bootstrap<a>,<a href="http://fontawesome.io">Font Awesome<a>

Tested on Debian and Ubuntu.
