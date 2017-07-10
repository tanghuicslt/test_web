import os
import random
laugh_list=[]
cough_list = []
wei_list = []

laugh_name_list = []
cough_name_list = []
wei_name_list = []

sample_num = 10 #the count of selecting voice

def random_voice(data_dir):
    cough_dict = {}
    for line in open(data_dir):
        temp = line.split(" ")
        name = temp[0].split('-')[1]
        if temp[1][-1] != 'v':
            temp[1] = temp[1][:-1]
        if cough_dict.has_key(name) == False:
            cough_dict[name]=[]
            cough_dict[name].append(temp[1])
        else:
            cough_dict[name].append(temp[1])

    name_list = cough_dict.keys()
    non_list = []
    for i in name_list:
        if len(cough_dict[i]) == 1:
            non_list.append(i)
    select_list = random.sample(name_list,sample_num*2)
    same_list = []
    diff_list = []
    same_flag = 0
    diff_flag = 0
    for i in select_list:
        if i not in non_list and same_flag == 0:
            same_list.append(i)
        elif diff_flag == 0 :
            diff_list.append(i)
        if len(same_list) == sample_num/2:
            same_flag = 1
        if len(diff_list) == sample_num :
            diff_flag = 1
        if same_flag == 1 and diff_flag == 1:
            break

    same_num = random.randrange(0,sample_num/2+1)
    ans_list = []
    diff_temp_list = []
    for i in range(same_num):
        ans_list.append(random.sample(cough_dict[same_list[i]],2))
    for i in range((sample_num/2-same_num)*2):
        diff_temp_list.append(random.sample(cough_dict[diff_list[i]],1)[0])
        if len(diff_temp_list) == 2 :
            ans_list.append(diff_temp_list)
            diff_temp_list = []

    rand_ans_list = random.sample(ans_list,sample_num/2)
   
    name_str = ""
    for i in rand_ans_list :
        print i[0],i[1],
        if i[0].split('/')[2].split('-')[1] == i[1].split('/')[2].split('-')[1]:
            name_str += data_dir[0] + '1'
        else:
            name_str += data_dir[0] + '0'
    return name_str,rand_ans_list
cough_name  = random_voice("cough-wav.txt")
laugh_name  = random_voice("laugh-wav.txt")
wei_name  = random_voice("wei-wav.txt")
print '\n',cough_name[0]+laugh_name[0]+wei_name[0]
