#!/bin/bash

sleep 15s

for desktop_files in ~/.config/autostart/*.desktop; do
	gtk-launch `basename $desktop_files`
done

sleep 10s
# firefox &
# terminator -l 3term &
# slack &
copyq &
feh --bg-max /home/abhishek/.dwm/wallpapers/goku_blue.jpg
#feh --bg-max /home/abhishek/.dwm/wallpapers/goku_steps_allforms.jpg
# cd /var/www/html/gateway/ && pm2 start server.js --name="main"
# cd /var/www/html/gateway-lp/ && pm2 start server.js --name="lp"
# cd /var/www/html/gateway-sb/ && pm2 start server.js --name="sb"
