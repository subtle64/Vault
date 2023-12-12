#include <stdio.h>

int main()
{
    long long n = 0, ans = 0, min = 0, curr = 0;
    scanf("%lld", &n);
    for (int i = 0; i < n; ++i)
    {
        scanf("%lld", &curr);
        min = curr > min ? curr : min;
        ans += min - curr;
    }
    printf("%lld", ans);
}