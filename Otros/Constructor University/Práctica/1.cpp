#include <iostream>
#include <math.h>
using namespace std;

int n;
int main()
{
    cin >> n;
    cout << 7 - ((n - 2) % 7 + 1);
}