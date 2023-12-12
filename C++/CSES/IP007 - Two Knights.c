#include <stdio.h>

int main()
{
    int n = 0;
    scanf("%d", &n);
    for (int k = 1; k <= n; ++k)
    {
        long long x = k * k, y = x * (x - 1) / 2, z = 4 * (k - 1) * (k - 2); // y=total possibilities, z=discarded possibiities
        printf("%lld\n", y - z);
    }
}