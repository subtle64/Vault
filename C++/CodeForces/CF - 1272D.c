#include <stdio.h>
#include <stdbool.h>

int max(int a, int b)
{
    return a > b ? a : b;
}

int solve(int *arr, int n)
{
    int start[n], end[n], ans = 1;
    for (int i = 0; i < n; ++i)
    {
        start[i] = 1;
        end[i] = 1;
    }

    for (int i = n - 2; i >= 0; --i)
    {
        if (arr[i + 1] > arr[i])
        {
            start[i] = 1 + start[i + 1];
        }
    }

    for (int i = 1; i < n; ++i)
    {
        if (arr[i] > arr[i - 1])
        {
            end[i] = 1 + end[i-1];
            ans = max(ans, end[i]);
        }
    }

    for (int i = 0; i < n - 2; ++i)
    {
        if (arr[i + 2] > arr[i])
        {
            ans = max(ans, end[i] + start[i + 2]);
        }
    }

    return ans;
}

int main()
{
    int n;
    scanf("%d", &n);

    int arr[n];
    for (int i = 0; i < n; ++i)
    {
        scanf("%d", &arr[i]);
    }

    printf("%d\n", solve(arr, n));
}