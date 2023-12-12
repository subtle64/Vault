#include <cstdio>
#include <algorithm>

int main()
{
    int n = 0, curr = 0;
    char prev = 0, arr[1000005] = {0};
    scanf("%s", arr);
    for (int i = 0; arr[i]; ++i)
    {
        arr[i] == prev ? ++curr : curr = 1;
        prev = arr[i];
        n = std::max(n, curr);
    }
    printf("%d", n);
}