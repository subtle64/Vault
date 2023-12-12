#include <iostream>
#include <vector>
#include <array>
#include <numeric>
#include <algorithm>

std::vector<std::tuple<int, int, int>> check{
    {0, 1, 2},
    {3, 4, 5},
    {6, 7, 8},
    {0, 3, 6},
    {1, 4, 7},
    {2, 5, 8},
    {0, 4, 8},
    {2, 4, 6}
};

int main() {
    std::array<int, 9> arr{};
    for (auto& i : arr)
        std::cin >> i;
    
    std::array<int, 9> c{};
    std::iota(c.begin(), c.end(), 0);

    int disappointed{};
    do {
        for (auto row : check) {

        }

    } while (std::next_permutation(c.begin(), c.end()));


    
}