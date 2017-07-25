#define _WIN32_WINNT 0x0501
#include <iostream>
#include <stdlib.h>
#include <windows.h>
#include <time.h>

void LeftClick (){  
  INPUT    Input={0};
  // left down 
  Input.type      = INPUT_MOUSE;
  Input.mi.dwFlags  = MOUSEEVENTF_LEFTDOWN;
  ::SendInput(1,&Input,sizeof(INPUT));

  // left up
  ::ZeroMemory(&Input,sizeof(INPUT));
  Input.type      = INPUT_MOUSE;
  Input.mi.dwFlags  = MOUSEEVENTF_LEFTUP;
  ::SendInput(1,&Input,sizeof(INPUT));
}

int main(int argc, char const *argv[]) {
  
  while (true) {
    
    if(GetAsyncKeyState(VK_F1) & 0x8000) {
      std::cout << "Apertou DOWN" << '\n';
      LeftClick();
    }  
    Sleep(100);
  }
  
  return 0;
}
