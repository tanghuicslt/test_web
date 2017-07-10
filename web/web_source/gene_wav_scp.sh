#!/bin/bash

data_dir='nonlan8k3/cough'
#mv  ${data_dir}/wav.scp  ${data_dir}/.wav.scp
for line in `ls ${data_dir}`
do
  exten="${line##*.}"
  filename="${line%.*}"
  if [ "$exten" == "wav" ];then
     echo $filename  ${data_dir}/$line >> wav.scp
  fi
done
