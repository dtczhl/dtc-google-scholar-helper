#!/bin/bash

path_to_git=/var/www/html/dtc-personal-website/dtc-google-scholar-helper

(
cd ${path_to_git}/Python_Offline
source activate Python_Offline && python main.py
scp -i /home/dtc/.ssh/id_rsa google_scholar_citation.txt dtczhl@www.huanlezhang.com:./public_html/dtc-google-scholar-helper/Python_Offline/
)
