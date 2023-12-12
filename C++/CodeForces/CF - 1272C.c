#include <stdio.h>
#include <stdbool.h>

int main() {
    
    int l, k;
    scanf("%d %d", &l, &k);

    char str[l+1];
    scanf(" %[^\n]", str);

    bool ok[26] = {0};
    for (int i=0; i<k; ++i) {
        char c;
        scanf(" %c", &c);
        ok[c - 'a'] = true;
    }

    long long ans = 0;
    int n = 0;
    for (int i=0; i<l; ++i) {
        if (!ok[str[i] - 'a']) {
            ans += 1ll * n*(n+1)/2;
            n = 0;
        } else {
            ++n;
        }
    }

    ans += 1ll * n*(n+1)/2;

    printf("%lld\n", ans);
}