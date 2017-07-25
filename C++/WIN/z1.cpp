#include <iostream>
#include <stdlib.h>
#include <windows.h>
#include <time.h>

int main(int argc, char const *argv[]) {

  keybd_event(VK_RETURN,0,0,0); //Enter
  Sleep(1000);//Number of Millaseconds
  keybd_event('N',0,0,0);
  keybd_event('o',0,0,0);
  keybd_event('o',0,0,0);
  keybd_event('b',0,0,0);
  keybd_event(VK_RETURN,0,0,0); //Enter
  return 0;

}
