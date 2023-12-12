#include <stdio.h>

int main() {
    int n=0;
    scanf("%d", &n);

    if (n==1) {
        printf("1\n");
    } else if (n<4) {
        printf("NO SOLUTION\n");
    } else {
        for (int i=2; i<=n; i+=2) { printf("%d ", i); } 
        for (int j=1; j<=n; j+=2) { printf("%d ", j); }
    }

    puts("");
}