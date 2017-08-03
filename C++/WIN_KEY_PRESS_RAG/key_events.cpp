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
  
  while (1) {
    
    if( GetAsyncKeyState( VK_UP ) & 0x8000 ) {
        std::cout << "Apertou UP" << '\n';
        LeftClick ();
    }

    if( GetAsyncKeyState( 'A' ) & 0x8000 )  {
      std::cout << "Apertou A" << '\n';
    }
    
    Sleep(10);
  }
  
  return 0;
}
