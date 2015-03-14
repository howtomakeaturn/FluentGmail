import os
import fileinput

from tempfile import mkstemp
from shutil import move
from os import remove, close

import sys
from termcolor import colored, cprint

def file_contain_str(file_path, pattern):
    file = open(file_path)
    for line in file:
        if (line.find(pattern) != -1):
            return True
    
    return False    

def replace(file_path, pattern, subst):
    #Create temp file
    fh, abs_path = mkstemp()
    new_file = open(abs_path,'w')
    old_file = open(file_path)
    for line in old_file:
        if (line.find(pattern) > 0):
            cprint('-' + line.rstrip('\n'), 'red')
            new_line = line.replace(pattern, subst)
            cprint('+' + new_line.rstrip('\n'), 'green')
            new_file.write(new_line)
        else:
            new_file.write(line)
    #close temp file
    new_file.close()
    close(fh)
    old_file.close()
    #Remove original file
    remove(file_path)
    #Move new file
    move(abs_path, file_path)
    os.chmod(file_path, 0755)    

root_path = '/home/howtomakeaturn/projects/ask-gmail-dev'
templates_path = root_path + '/'

templates = []

for path, subdirs, files in os.walk(templates_path):
    for name in files:
        templates.append(os.path.join(path, name))

original_string = raw_input('Enter the original string: ')

fixed_string = raw_input('Enter the fixed string: ')

for template in templates:
    if (file_contain_str(template, original_string)):
        cprint('File: ' + template.replace(root_path + '/', ''), 'grey', 'on_white')
        replace(template, original_string, fixed_string)        
