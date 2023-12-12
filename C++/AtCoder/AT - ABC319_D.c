#include <stdio.h>
#include <stdbool.h>

bool possible(long long w, int *arr, int n, int m)
{
    long long curr = arr[0];
    for (int i = 1; i < n; ++i)
    {
        if (curr + arr[i] + 1 <= w)
        {
            curr += arr[i] + 1;
        }
        else if (m > 1)
        {
            --m;
            curr = arr[i];
        }
        else
        {
            return false;
        }
    }
    return true;
}

long long solve(int n, int m, int *arr)
{
    long long sum = 0, ans = 0, max = 0;
    for (int i = 0; i < n; ++i)
    {
        sum += arr[i];
        max = arr[i] > max ? arr[i] : max;
    }

    long long l = max, r = sum + n - 1;

    while (l <= r)
    {
        long long mp = l + (r - l) / 2;
        if (possible(mp, arr, n, m))
        {
            ans = mp;
            r = mp - 1;
        }
        else
        {
            l = mp + 1;
        }
    }

    return ans;
}

int main()
{
    int n, m;
    scanf("%d %d", &n, &m);

    int arr[n];
    for (int i = 0; i < n; ++i)
    {
        scanf("%d", &arr[i]);
    }

    printf("%lld\n", solve(n, m, arr));
}