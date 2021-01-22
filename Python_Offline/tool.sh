#!/bin/bash


# >>> conda initialize >>>
# !! Contents within this block are managed by 'conda init' !!
 __conda_setup="$('/home/dtc/Software/Anaconda/bin/conda' 'shell.bash' 'hook'     2> /dev/null)"
if [ $? -eq 0 ]; then
    eval "$__conda_setup"
else
    if [ -f "/home/dtc/Software/Anaconda/etc/profile.d/conda.sh" ]; then
        . "/home/dtc/Software/Anaconda/etc/profile.d/conda.sh"
    else
        export PATH="/home/dtc/Software/Anaconda/bin:$PATH"
    fi
fi
unset __conda_setup
# <<< conda initialize <<<


path_to_git=/var/www/html/dtc-personal-website/dtc-google-scholar-helper

(
cd ${path_to_git}/Python_Offline
conda activate Python_Offline && python main.py
scp -i /home/dtc/.ssh/id_rsa google_scholar_citation.txt dtczhl@www.huanlezhang.com:./public_html/dtc-google-scholar-helper/Python_Offline/
)

