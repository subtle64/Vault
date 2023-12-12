#include <stdio.h>

const long long MOD = 1000000007;

int main() {
    long long n=0, x=2, res=1;
    scanf("%lld", &n);
    while (n>0) {
        if (n&1) {
            res=res*x%MOD;
        }
        x = x*x%MOD;
        n>>=1;
    }
    printf("%lld\n", res);
}
