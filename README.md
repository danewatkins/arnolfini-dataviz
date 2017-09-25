# arnolfini-dataviz

## A live animated  visualisation of audience engagement data.
This README contains the instructions for installing a data visualisation of audience responses (see https://github.com/danewatkins/arnolfini-survey/) onto Raspberry Pi and 7 inch touchscreen.

The data visualisation is built in HTML and PHP and installed on an apache2 server on the Raspberry Pi (RPi). A cron job collects the data from a remote database and writes the data to a local file. All the files are contained locally on the RPi which ensures the survey runs even when the local wifi network is down or congested.

### Create a Raspbian SD card
https://www.raspberrypi.org/downloads/raspbian/  
Download Raspbian image, these instructions work for Raspbian Stretch and may give different results for later versions.

https://www.sdcard.org/downloads/formatter_4/  
Use sd card formatter as OSX disk utility has problems formatting fat drives

https://etcher.io/  
Use etcher to burn the image onto the sd card

### Set up Raspberry Pi
http://alexba.in/blog/2013/01/04/raspberrypi-quickstart/
```
$: sudo apt-get update
$: sudo apt-get upgrade
$: sudo apt-get dist-upgrade
```

** !! CHANGE PASSWORD !! **

Raspberry Pi default username is 'pi' and the default password is 'raspberry' if you don't change the password and allow ssh on the Pi then anyone will be able to gain access to the pi and all its data.
```
$: sudo raspi-config
```

### Install apache
```
$: sudo apt-get install apache2 -y  
```
Raspbian creates server permissions as root  
Check http://localhost in chrome

### Install PHP
```
$: sudo apt-get install php5 libapache2-mod-php5 -y
```
### Clone git files into html folder

Git is installed in Raspbian Stretch  
```
$: cd /var/www/html
$: sudo git clone https://github.com/danewatkins/arnolfini-survey.git
```

```
/var/www/html/arnolfini-dataviz/get-data-viz.php
```

get-data-viz.php connects to the remote data base and writes the data to guage-data/include.php

```
/var/www/html/arnolfini-dataviz/guage-data/include.php
```

which is visualised by the interface.

### Connect remotely to Pi via
http://remote-iot.com
REMOTE-iOT offer a free service to remotely connect to networked devices. They offer up to five device free of charge unfortunately all the free connections are on the same server and the connection is down most of the time. survey RPi continued to send data, I could see it on my server, so the RPi was running but REMOTE-iOT failed. Their support suggested running a cron job to reconnect.

### Set up cron job to collect data
Run crontab as root as the permissions on the web server are all root
```
$: sudo crontab -e
```
add this line
```
6 * * * * /var/www/html/arnolfini-dataviz/get-data-viz.php
* 6 * * * curl -s -L https://remote-iot.com/install/upgrade.sh | sudo -s bash
 ```

This runs the php file once at 6 minutes past the hour to collect the data. The survey sends the data to the remote database once an hour so this cron jobs only needs to run once an hour to update the data visualisation.

By default on Debian the cron log isn't working

open
```
$: sudo vim /etc/rsyslog.conf
```
and uncomment the line
```
# cron.*
```
restart rsyslog via
```
$ sudo /etc/init.d/rsyslog restart
```
### Set up Pi for kiosk mode
Copy the autostart file into home .config folder which is read on reboot.
```
cp /etc/xdg/lxsession/LXDE-pi/autostart  /home/pi/.config/lxsession/LXDE-pi/autostart
```
Open the file in your favourite text editor
```
sudo vim /home/pi/.config/lxsession/LXDE-pi/autostart
```
Add these lines to run Chrome in kiosk mode on reboot
```
#@xscreensaver -no-splash
@point-rpi
@xset s off
@xset -dpms
@xset s noblank
@chromium-browser --kiosk --start-maximised --incognito --disable-pinch --overscroll-history-navigation=0 http://localhost/arnolfini-dataviz/index.php
```
--kiosk  
runs Chrome fullscreen  
--start-maximised runs Chrome fullscreen to the maximum screen dimensions  
--disable-pinch
disables gesture on the touch screen and stope the user from enlarging the page through pinch control  
--overscroll-history-navigation=0  
stops the users from going back a page by swiping left  
--incognito  creates a new Chrome incognito session

### Hide cursor
There are several Raspberry Pi kiosk tutorials that recommend using ```unclutter``` to hide the mouse. Our first version of the survey used unclutter and it may have been one of the reasons why the touch failed, it could also have been the heat and the poor connectivity. But there were times when touch wouldn't work navigating the local operating system.

Using css ```cursor:none``` to hide the cursor doesn't work in a kiosk. On reboot the mouse shows and is only hidden with a mouse movement not a touch movement. The mouse can be hidden through the x-server.
```
sudo vim etc/lightdm/lightdm.conf
```
uncomment
```
#xserver-command = X
```
add -nocursor on line 91
```
#xserver-command = X -nocursor
```
## Disconnect touchscreen
The RPi 7 touchscreen uses I2C to read the touches from the screen into the RPi to operate the touch. The data visualisation interface doesn't have any user interactivity so these wires shouldn't be connected. The black and red cables power the screen from the RPi

- black -> pin 4 | 5V
- red -> pin 6 | GROUND
- green (SDA) -> pin 3 | GPIO2 | SDA1
- yellow (SCL) -> pin 4 | GPIO3 | SCL1
