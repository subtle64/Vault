#include <stdio.h>

int main() {
    int t;
    scanf("%d", &t);
    while (t--) {
        int x, y;
        scanf("%d %d", &x, &y);
        printf("%s\n", x >= 4 || x >= y || (x == 2 && y == 3) ? "YES" : "NO");
    }
}