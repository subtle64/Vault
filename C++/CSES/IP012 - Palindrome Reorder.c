#include <stdio.h>

int main() {
    int count[26] = {0};
    char c=0;
    while (scanf("%c", &c) != EOF && c!='\n') {
        ++count[c-'A'];
    }
    for (int i=0; i<26; ++i) {
        if (count[i] % 2 != 0) {
            
        }
    }











}