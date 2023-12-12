#include <stdio.h>

int sum(int x) {
    return x<=0 ? 0 : (x - x/2) * (x%2 ? -1 : 1);
}

int main() {
    int q;
    scanf("%d", &q);
    while (q--) {
        int l, r;
        scanf("%d %d", &l, &r);
        printf("%d\n", sum(r) - sum(l-1));
    }
}