#include <stdio.h>

int main()
{
    long long n = 0, sum = 0, tmp = 0;
    scanf("%lld", &n);

    for (int i = 0; i < n - 1; ++i)
    {
        scanf("%lld", &tmp);
        sum += tmp;
    }

    printf("%lld\n", n * (n + 1) / 2 - sum);
}