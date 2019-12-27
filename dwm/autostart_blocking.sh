#!/bin/bash

# set volume to 50%
amixer cset numid=4,iface=MIXER,name='Master Playback Switch' 50%
amixer cset numid=3,iface=MIXER,name='Master Playback Volume' 50%

#conky -d -c /home/abhishek/.config/conky/.conkyrc
compton -b 
slstatus &
guake & disown
xiccd & disown
