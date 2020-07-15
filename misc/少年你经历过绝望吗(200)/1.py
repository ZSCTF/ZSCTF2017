#-*-coding:utf-8-*-
import base64
string1='e2RvZntoZ2RvZi9ibmw='
d=base64.b64decode(string1)
d=[ord(i) for i in d]
for i in xrange(0,14):
	d[i]^=1
d=''.join(chr(i) for i in d)
