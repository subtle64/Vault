#include <stdio.h>

int main() {
    int t;
    scanf("%d", &t);
    while (t--) {
        int l, x=0, ans=0;
        scanf("%d", &l);

        char c;
        for (int i=0; i<l; ++i) {
            scanf(" %c", &c);
            if (c == ')') {
                x > 0 ? --x : ++ans;
            } else {
                ++x;
            }
        }

        printf("%d\n", ans);
    }
}