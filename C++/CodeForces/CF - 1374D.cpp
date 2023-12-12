#include <iostream>
#include <vector>
#include <algorithm>

long long solve(std::vector<int> &v, int n, int k)
{
    for (auto &i : v)
    {
        i = (i % k == 0) ? 0 : k - (i % k);
    }

    std::sort(v.begin(), v.end());

    if (v[n - 1] == 0)
        return 0;

    int max_k{v[0]}, max_n{1};
    int curr_k{v[0]}, curr_n{1};
    for (int i{1}; i < n; ++i)
    {
        if (v[i] == 0 || v[i] != v[i - 1])
        {
            if (curr_n >= max_n)
            {
                max_n = curr_n;
                max_k = curr_k;
            }
            curr_n = 1;
            curr_k = v[i];
        }
        else
        {
            ++curr_n;
        }
    }

    if (curr_n >= max_n)
    {
        max_n = curr_n;
        max_k = curr_k;
    }

    return 1ll * (max_n - 1) * k + max_k + 1;
}

int main()
{

    std::cin.tie(0)->sync_with_stdio(0);
    
    int t{};
    std::cin >> t;

    while (t--)
    {
        int n{}, k{};
        std::cin >> n >> k;
        std::vector<int> v(n);
        for (int i{0}; i < n; ++i)
        {
            std::cin >> v[i];
        }

        std::cout << solve(v, n, k) << '\n';
    }
}