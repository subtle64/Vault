#include <cstdio>
#include <algorithm>
//a = 2x + 1y
//b = 1x + 2y
//a - y = 2x
//b - 2y = x
//----------
//2a - b = 3x
//x cannot be negative, therefore 2a >= b

int main() {
    int t=0;
    scanf("%d", &t);
    while (t--) {
        int a=0, b=0;
        scanf("%d %d", &a, &b);
        (a+b)%3 == 0 && 2*std::min(a, b) >= std::max(a, b) ? puts("YES") : puts("NO");
    }
}