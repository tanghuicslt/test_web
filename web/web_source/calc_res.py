import os
import random
import sys,getopt
def calc_res(args):
    print args
    
if "__main__" == __name__:
    opts,args = getopt.getopt(sys.argv[1:], "ao:c", ["help", "output="]);
    for i in sys.argv:
        print i 
   #print(args[0],args[1]);
    temp1 = args[0];
    temp2 = args[1];
    len1 = len(temp1);
    len2 = len(temp2);
    print len1,len2
    count = len1;
    l_count = 0;
    c_count = 0;
    w_count = 0;
    laugh_error_count = 0;
    cough_error_count = 0;
    wei_error_count = 0;
    if (len1 == len2):
        for i in range(0,len1,2):
            if (temp1[i] == 'l'):
                l_count += 1
                if(temp1[i+1] != temp2[i+1]):
                    laugh_error_count += 1
                    
            elif (temp1[i] == 'c'):
                c_count += 1
                if(temp1[i+1] != temp2[i+1]):
                    cough_error_count += 1

            elif (temp1[i] == 'w'):
                w_count += 1
                if(temp1[i+1] != temp2[i+1]):
                    wei_error_count += 1
        print c_count,cough_error_count,l_count,laugh_error_count,w_count,wei_error_count
