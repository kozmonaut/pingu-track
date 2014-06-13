pingu-track
===========
Light Linux Monitor in combination with HTML+PHP+JS.

![Alt text](/kozmonaut/pingu-track/master/img/pingu-track-screenshot.png "pingu-track screenshot")

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
* For each widget you can change his dimensions and positions with data-row="x" data-col="x" data-sizex="x" data-sizey="x"
* Number of grid columns and rows can be changed in /gridster/grid-positions.js
* Modify linux commands according to your needs in index.php

Credits goes to <a href="http://gridster.net/">Gridster<a>,<a href="http://getbootstrap.com">Bootstrap<a>,<a href="http://fontawesome.io">Font Awesome<a>

Tested on Debian and Ubuntu.