#include<cstdio>
#include<cstring>
#include<stdlib.h>
#include<Windows.h>
#include<iostream>
using namespace std;
int p[100][100] = { 0 };
int sum = 0;
int dp[100][100];
void Decrypt(char *ptr,int Size,int code)
{
	MEMORY_BASIC_INFORMATION mbi_thunk;
	VirtualQuery(ptr, &mbi_thunk, sizeof(MEMORY_BASIC_INFORMATION));
	VirtualProtect(mbi_thunk.BaseAddress, mbi_thunk.RegionSize, PAGE_EXECUTE_READWRITE, &mbi_thunk.Protect);

	while (Size--)
	{
		*ptr = (*ptr) ^ code;
		++ptr;
	}
	DWORD dwOldProtect;
	VirtualProtect(mbi_thunk.BaseAddress, mbi_thunk.RegionSize, mbi_thunk.Protect, &dwOldProtect);
}
void then(char *step)
{
	int address1, address2;
	__asm
	{
		mov address1,offset begindecrypt
		mov address2,offset enddecrypt
	}
	bool bSucceed = 0;
	int Size = address2 - address1;
	char *ptr = (char *)address1;
	Decrypt(ptr, Size,4);
	__asm inc eax
	__asm dec eax
	begindecrypt:
		for (int i = 0;i < 19;++i)
		{
			if(i%2)
				step[i] ^= 4;
		}
	enddecrypt:
	__asm inc eax
	__asm dec eax
	Decrypt(ptr, Size, 4);
	return;
}
int main()
{
	srand(0xc);
	memset(dp, 0, sizeof(dp));
	char step[100];
	int i, j;
	for (i = 1;i <= 20;++i)
	{
		for (j = 1;j <= i;++j)
		{
			p[i][j] = rand() % 100000;
		}
	}
	printf("input your key with your operation can get the maximum:");
	scanf("%s", step);
	if (strlen(step) != 19)
	{
		printf("error\n");
		system("pause");
		return 0;
	}
	then(step);
	int time = 0;
	i = j = 1;
	sum = sum + p[i][j];
	while (time<19)
	{
		if (step[time] == 'L')
		{
			sum = sum + p[++i][j];
		}
		else if (step[time] == 'R')
		{
			sum = sum + p[++i][++j];
		}
		else
		{
			printf("error\n");
			system("pause");
			return 0;
		}
		time++;
	}
	printf("your operation can get %d points\n", sum);
	system("pause");
	return 0;
}
