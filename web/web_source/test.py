import os
import random
laugh_list=[]
cough_list = []
wei_list = []

laugh_name_list = []
cough_name_list = []
wei_name_list = []

sample_num = 6 #the count of selecting voice

for line in open('cough-wav.txt'):
    temp = line.split(" ")
    cough_list.append(temp)

for line in open('laugh-wav.txt'):
    
    temp = line.split(" ")
    laugh_list.append(temp)

for line in open('wei-wav.txt'):
    temp = line.split(" ")
    wei_list.append(temp)


num=range(len(cough_list))
diff_num = random.sample(num,sample_num)
for i in diff_num:
    if(cough_list[i][1][-1] == 'v'):
        print cough_list[i][1],
    else:
        print cough_list[i][1][:-1],
    cough_name_list.append(cough_list[i][0])


num=range(len(laugh_list))
diff_num = random.sample(num,sample_num)
for i in diff_num:
    if(laugh_list[i][1][-1] == 'v'):
        print laugh_list[i][1],
    else:
        print laugh_list[i][1][:-1],
    laugh_name_list.append(laugh_list[i][0])
    
num=range(len(wei_list))
diff_num = random.sample(num,sample_num)
for i in diff_num:
    if(wei_list[i][1][-1] == 'v'):
        print wei_list[i][1],
    else:
        print wei_list[i][1][:-1],
    wei_name_list.append(wei_list[i][0])
print "\n",

j=0
temp_list = []
laugh_str = ""
for i in range(len(laugh_name_list)):
    if ( i %2 == 0):
        temp_list = []
    temp_list.append(laugh_name_list[i].split('-'))
    
    if(i %2 ==1):
        if(temp_list[0][1] == temp_list[1][1]):
            
            laugh_str += "l"+"1"
        else:
            laugh_str += "l"+"0"
            
j=0
temp_list = []
cough_str = ""
for i in range(len(cough_name_list)):
    if ( i %2 == 0):
        temp_list = []
    temp_list.append(cough_name_list[i].split('-'))
    
    if(i %2 ==1):
        if(temp_list[0][1] == temp_list[1][1]):
            
            cough_str += "c"+"1"
        else:
            cough_str += "c"+"0"        

j=0
temp_list = []
wer_str = ""
for i in range(len(wei_name_list)):
    if ( i %2 == 0):
        temp_list = []
    temp_list.append(wei_name_list[i].split('-'))
    
    if(i %2 ==1):
        if(temp_list[0][1] == temp_list[1][1]):
            
            wer_str += "w"+"1"
        else:
            wer_str += "w"+"0"
            
print cough_str+laugh_str+wer_str
   
    
    

