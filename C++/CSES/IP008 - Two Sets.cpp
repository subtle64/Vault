#include <cstdio>
#include <vector>

void print(std::vector<int> &s)
{
    printf("%d\n", s.size());
    for (auto i : s)
    {
        printf("%d ", i);
    };
    puts("");
}

int main()
{
    int n = 0;
    scanf("%d", &n);
    if (n % 4 == 0 || n % 4 == 3)
    {
        puts("YES");
        std::vector<int> s1{}, s2{};
        int c = (n % 4 == 0 ? 1 : 3);
        for (int i = 1; i <= n; ++i)
        {
            (i % 4 == 0 || i % 4 == c) ? s1.push_back(i) : s2.push_back(i);
        }
        print(s1);
        print(s2);
    }
    else
    {
        puts("NO");
    }
}