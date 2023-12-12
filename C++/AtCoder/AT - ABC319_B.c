#include <stdio.h>
#include <stdbool.h>

int main() {
    int n;
    scanf("%d", &n);
    for (int i=0; i<=n; ++i) {
        bool isFound = false;
        for (int j=1; j<=9; ++j) {
            if (n%j == 0 && i%(n/j) == 0) {
                printf("%d", j);
                isFound = true;
                break;
            }
        }
        if (!isFound) {
            printf("-");
        }
    }
    puts("");
}