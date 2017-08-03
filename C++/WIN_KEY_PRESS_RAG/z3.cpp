#include "stdafx.h" 
#include <tchar.h> 

#define _WIN32_WINNT 0x0501 
#include <windows.h> 
#include <iostream> 

using namespace std; 

void main() { 

  char end; 
  HWND windowHandle = FindWindow(0, _T("Atom")); 
  INPUT *key; 

  if(windowHandle == NULL) { 
   cout << "not found"; 
    exit; 
  } 

  SetForegroundWindow(windowHandle); 
  Sleep(1000); 

  key = new INPUT; 
  key->type = INPUT_KEYBOARD; 
  key->ki.wVk = 120; 
  key->ki.dwFlags = 0; 
  key->ki.time = 0; 
  key->ki.wScan = 0; 
  key->ki.dwExtraInfo = 0; 
  while(1) { 
      if(GetAsyncKeyState(VK_NUMPAD7)) { 
          exit(0); 
      } 
    SendInput(1,key,sizeof(INPUT)); //keydown 
    key->ki.dwExtraInfo = KEYEVENTF_KEYUP; 
    SendInput(1,key,sizeof(INPUT));//keyup 
    Sleep(100);  
  } 
  exit(0); 

}  
