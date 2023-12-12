#include <stdio.h>

int main() {
    int n=0, ans=0;
    scanf("%d", &n); 
    for (int i=5; n/i >= 1; i*=5) { //Legendre's Formula
        ans+=n/i;
    } 
    printf("%d\n", ans);
}