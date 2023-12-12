#include <stdio.h>

int main()
{
    long long n = 0;
    scanf("%lld", &n);

    while (n != 1)
    {
        printf("%lld ", n);
        n = (n % 2 == 0) ? n / 2 : n * 3 + 1;
    }

    puts("1");
}