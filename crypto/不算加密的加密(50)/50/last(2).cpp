#include<stdio.h>
#include<string.h>
char string1[]="我忘了";
char key[]="要不？去找找?";
char flag[]="我也忘了";
void _flag()
{
	int L=strlen(flag);
	int i;
	for(i=0;i<L;++i)
		flag[i]^=10;
	for(i=0;i<L;++i)
		flag[i]^=string1[i];
	//flag={69,87,94,94,92,56,94,1,14,92,74,89}
}
void _key()
{
	int L=strlen(key);
	int i;
	for(i=0;i<L;++i)
		key[i]^=0x1;
}
void _string()
{
	_key();
	int L=strlen(string1);
	int i,j;
	for(i=0;i<L;++i)
	{
		string1[i]^=1;
		string1[i]+=3;
		string1[i]^=2;
	}
	for(j=0;j<L/2;++j)
	{
		string1[j]=string1[L-1-j]+string1[j];
		string1[L-1-j]=string1[j]-string1[L-1-j];
		string1[j]=string1[j]-string1[L-1-j];
		string1[j]^=0x12;
	}
	for(i=0;i<L;++i)
		string1[i]^=key[i];
	//string1={62,40,39,61,48,53,62,51,37,123,41,63}
}
int main()
{
	//我记得key好像在某个地方,还有就是原flag字串的值就是flag
	_flag();
	if(!strcmp(flag,"5L2g5LiN5Lya5Lul5Li66L+Z5Liq5bCx5piv562U5qGI5ZCn"))
		printf("54S26ICM5bm25rKh5pyJ5LuA5LmI5Y2155So\n");
	return 0;
}
