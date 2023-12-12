#include <cstdio>
#include <algorithm>

long long solve(int x, int y)
{
    int p = std::max(x, y);
    long long nsq = 1ll * p * p;
    return p % 2 == 0 ? nsq - (p - x) - (y - 1) : nsq - (x - 1) - (p - y);
}

int main()
{
    int t = 0, x = 0, y = 0;
    scanf("%d", &t);
    while (t--)
    {
        scanf("%d %d", &x, &y);
        printf("%lld\n", solve(x, y));
    }
}