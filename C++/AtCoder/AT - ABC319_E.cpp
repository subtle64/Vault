#include <iostream>
#include <vector>
#include <utility>

int main() {
    int n{}, x{}, y{};
    std::cin >> n >> x >> y;
    std::vector<std::pair<int, int>> p(n-1);
    for (int i{0}; i<n-1; ++i) {
        std::cin >> p[i].first >> p[i].second;
    }

    int Q{};
    std::cin >> Q;
    while (Q--) {
        int q{};
        std::cin >> q;

    }
}