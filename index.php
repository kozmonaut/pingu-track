<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pingu-Track | Light Linux Monitor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/dashboard.css" rel="stylesheet">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="gridster/css/jquery.gridster.css">
        <link rel="stylesheet" type="text/css" href="gridster/css/styles.css">
        <!-- Reset local storage -->
        <script type="text/javascript">
            function reset(){
            localStorage.clear();
            window.location.reload();
            }
             
        </script>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"></a>
                    <a class="brand" href="index.php"><i class="icon-cogs"></i> pingu-track </a>
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <button class="btn btn-default" onclick="reset()">
                                <li class="dropdown">Reset Layout</li>
                            </button>
                            <a href="Javascript:window.location.reload()">
                                <button class="btn btn-info">
                                    <li class="dropdown"><i class="icon-refresh"></i></li>
                                </button>
                            </a>
                            <button class="btn btn-warning">
                                <li class="dropdown"><i class="icon-time"></i> <b>Time:</b> <?php system("/bin/date"); ?></li>
                            </button>
                            <button class="btn btn-success">
                                <li class="dropdown"><i class="icon-user"></i> <b>Logged as:</b> <?php system("users | awk '{print $1}'"); ?></li>
                            </button>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
                <!-- /container -->
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="main">
        <div class="main-inner">
            <div class="container">
                <!-- GRIDSTER START -->
                <div class="gridster">
                    <ul>
                        <!-- SYSTEM WIDGET -->
                        <li id="li1" class="widget" data-row="1" data-col="1" data-sizex="1" data-sizey="2">
                            <div class="widget-header" style="background-color:#4BD9DB">
                                <i class="icon-info-sign"></i>
                                <h3>System</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <h4>Architecture</h4>
                                <?php system("uname -m"); ?>
                                <h4>Kernel version</h4>
                                <?php system("uname -v -r"); ?>
                                <h4>Processor</h4>
                                <?php system("cat /proc/cpuinfo | grep \"name\" | cut -d : -f2 | uniq"); ?>
                                <h4>Operating system</h4>
                                <?php system("cat /etc/*-release | grep \"PRETTY_NAME\" | cut -d \"=\" -f2 | uniq"); ?>
                                <h4>System hostname</h4>
                                <?php system("hostname"); ?>
                            </div>
                            <!-- /widget-content -->
                        </li>
                        <!-- NETWORK WIDGET -->
                        <li id="li2" class="widget" data-row="2" data-col="3" data-sizex="1" data-sizey="2">
                            <div class="widget-header" style="background-color:#A81CBA;">
                                <i class="icon-signal"></i>
                                <h3>Network</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <h4>Interfaces</h4>
                                <pre><?php system("ip link show | grep 'eth\|wlan' | awk '{print $1,$2}'"); ?></pre>
                                <h4>IP addresses</h4>
                                <pre><?php system("ip a | grep 'eth\|wlan' | awk '{print $1,$2}'"); ?></pre>
                            </div>
                            <!-- /widget-content -->
                        </li>
                        <!-- BANDWIDTH WIDGET -->
                        <li id="li3" class="widget" data-row="4" data-col="2" data-sizex="1" data-sizey="1">
                            <div class="widget-header">
                                <i class="icon-download"></i>
                                <h3>Bandwidth(eth0)</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <div id="big_stats">
                                    <div class="stat">
                                        <h2>Transmitted</h2>
                                        </br>
                                        <span class="value"><?php system("/sbin/ifconfig eth0 | grep 'TX bytes' | awk '{print $7,$8}'"); ?></span> 
                                    </div>
                                    <!-- .stat -->
                                    <div class="stat">
                                        <h2>Recieved</h2>
                                        </br>
                                        <span class="value"><?php system("/sbin/ifconfig eth0 | grep 'RX bytes' | awk '{print $3,$4}'"); ?></span>
                                    </div>
                                    <!-- .stat -->
                                </div>
                            </div>
                            <!-- /widget-content -->
                        </li>
                        <!-- LAST 5 PINGS WIDGET -->
                        <li id="li4" class="widget" data-row="3" data-col="1" data-sizex="1" data-sizey="1">
                            <div class="widget-header">
                                <i class="icon-flag"></i>
                                <h3>Last 5 Pings</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <pre><?php system("ping -c 5 google.com | head -n 6 | awk '{print $3,$4,$8,$9,$10}'"); ?></pre>
                            </div>
                            <!-- /widget-content -->
                        </li>
                        <!-- FAST STATS WIDGET -->
                        <li id="li5" class="widget" data-row="1" data-col="2" data-sizex="2" data-sizey="1">
                            <div class="widget-header">
                                <i class="icon-list"></i>
                                <h3>Fast Stats</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <div id="big_stats">
                                    <div class="stat">
                                        <i class="icon-anchor"></i> Uptime 
                                        <h3><?php $seconds= shell_exec("/usr/bin/cut -d. -f1 /proc/uptime"); $totalMin = $seconds/60;$totalHours = $totalMin/60;echo round($totalHours); ?> hour(s)</h3>
                                    </div>
                                    <!-- .stat -->
                                    <div class="stat">
                                        <i class="icon-tasks"></i> Processes 
                                        <h3><?php system("ps -ef | wc -l"); ?></h3>
                                    </div>
                                    <!-- .stat -->
                                    <div class="stat">
                                        <i class="icon-adjust"></i> Memory used 
                                        <h3><?php system("free -m | awk 'NR==2{print $3}'"); ?> MB</h3>
                                    </div>
                                    <!-- .stat -->
                                    <div class="stat">
                                        <i class="icon-bullhorn"></i> Ping (google.com) 
                                        <h3><?php $output = shell_exec("ping -c 1 google.com | tail -1| awk '{print $4}' | cut -d '=' -f 3"); $result = substr($output,0,6); echo $result . "ms"; ?></h3>
                                    </div>
                                    <!-- .stat --> 
                                </div>
                            </div>
                            <!-- /widget-content -->
                        </li>
                        <!-- DISKS WIDGET -->
                        <li id="li6" class="widget" data-row="3" data-col="2" data-sizex="1" data-sizey="1">
                            <div class="widget-header" style="background-color:#1B88E0">
                                <i class="icon-folder-open"></i>
                                <h3>Disk space(GB)</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <pre><?php system("df -BG | head -n 5 | awk '{print $1,$3,$4}'"); ?></pre>
                            </div>
                            <!-- /widget-content -->
                        </li>
                        <!-- MEMORY WIDGET -->
                        <li id="li7" class="widget" data-row="4" data-col="1" data-sizex="1" data-sizey="1">
                            <div class="widget-header" style="background-color:#E35D5D">
                                <i class="icon-bar-chart"></i>
                                <h3>Memory</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <div id="big_stats">
                                    <div class="stat">
                                        <h2>Total</h2>
                                        </br><span class="value"><?php system("free -m | awk 'NR==2{print $2}'"); ?> MB</span>
                                    </div>
                                    <!-- .stat -->
                                    <div class="stat">
                                        <h2>Used</h2>
                                        </br><span class="value"><?php system("free -m | awk 'NR==2{print $3}'"); ?> MB</span>
                                    </div>
                                    <!-- .stat -->
                                    <div class="stat">
                                        <h2>Free</h2>
                                        </br><span class="value"><?php system("free -m | awk 'NR==2{print $4}'"); ?> MB</span>
                                    </div>
                                    <!-- .stat -->
                                </div>
                            </div>
                            <!-- /widget-content -->
                        </li>
                        <!-- PROCESSES USAGE -->
                        <li id="li8" class="widget" data-row="2" data-col="2" data-sizex="1" data-sizey="1">
                            <div class="widget-header" style="background-color:#E35D5D">
                                <i class="icon-bar-chart"></i>
                                <h3>Process Usage</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <pre><?php system("ps aux | awk '{print $2, $3, $4, $11}' | head -1 && ps axu | awk '{print $2, $3, $4, $11}' | sort -k3 -nr | head -5"); ?></pre>
                            </div>
                            <!-- /widget-content --> 
                        </li>
                        <!-- LAST LOGGED IN -->
                        <li id="li9" class="widget" data-row="4" data-col="3" data-sizex="1" data-sizey="1">
                            <div class="widget-header" style="background-color:#E35D5D">
                                <i class="icon-bar-chart"></i>
                                <h3>Last Logged In</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <pre><?php system("last | awk '{print $1,$4,$5,$6,$7}' | head -n 6"); ?></pre>
                            </div>
                            <!-- /widget-content -->                       
                        </li>
                    </ul>
                    <!-- /gridster -->
                </div>
                <!-- /container -->
            </div>
            <!-- /main-inner -->
        </div>
        <!-- /main -->
        <!-- FOOTER -->
        <div class="footer">
            <div class="container">
                <div class="span12">
                    &copy; 2014 <a href="index.php">pingu-track | Light Linux Monitor</a> | <i class="icon-github"></i> <a href="http://www.github.com/kozmonaut/pingu-track">Fork at Github</a>
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /footer -->
        <!-- JAVASCRIPT FILES -->
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="gridster/jquery.gridster.js" charster="utf-8"></script>
        <script type="text/javascript" src="gridster/grid-positions.js"></script>
    </body>
</html>
