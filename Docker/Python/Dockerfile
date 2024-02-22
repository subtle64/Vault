FROM nvidia/cuda:12.3.1-base-ubuntu22.04
RUN apt update && apt install wget python3 -y 
RUN wget https://bootstrap.pypa.io/get-pip.py
RUN python3 get-pip.py --no-setuptools --no-wheel
RUN rm -rf get-pip.py