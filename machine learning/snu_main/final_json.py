from rfr_main import a

value = a()
ind = value[0]


pyt = {
    'value' : ind
}


import json 


file_path = "E:/pytojs/pyjs.txt" ## your path variable
afile = open(file_path,'w')
afile.write(json.dumps(pyt , default=str))
afile.close()