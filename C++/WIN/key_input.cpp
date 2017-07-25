#include <windows.h> 
#include <stdio.h>
 
#define VK_A 0x41
#define VK_B 0x42
#define VK_E 0x45
#define VK_H 0x48
#define VK_O 0x4F
#define VK_R 0x52
#define VK_S 0x53
#define VK_W 0x57
 
int main(void)
{
    HWND hWnd=NULL; 
    HWND hWndEdit=NULL; 
 
    hWnd=FindWindow("Notepad",NULL);
    
    if(hWnd==NULL) {
        printf("Error: Can't find Notepad, aborting\n");
        return 0;
    }
    
    hWndEdit=FindWindowEx(hWnd,NULL,"Edit",NULL);
    
    if(hWndEdit==NULL) {
        printf("Error: Can't find Notepad Edit, aborting\n");
        return 0;
    }
    
    PostMessage(hWndEdit, WM_KEYDOWN, VK_B, 1);
    PostMessage(hWndEdit, WM_KEYDOWN, VK_O, 1);
    PostMessage(hWndEdit, WM_KEYDOWN, VK_B, 1);
    PostMessage(hWndEdit, WM_KEYDOWN, VK_SPACE, 1);
    PostMessage(hWndEdit, WM_KEYDOWN, VK_W, 1);
    PostMessage(hWndEdit, WM_KEYDOWN, VK_A, 1);
    PostMessage(hWndEdit, WM_KEYDOWN, VK_S, 1);
    PostMessage(hWndEdit, WM_KEYDOWN, VK_SPACE, 1);
    PostMessage(hWndEdit, WM_KEYDOWN, VK_H, 1);
    PostMessage(hWndEdit, WM_KEYDOWN, VK_E, 1);
    PostMessage(hWndEdit, WM_KEYDOWN, VK_R, 1);
    PostMessage(hWndEdit, WM_KEYDOWN, VK_E, 1);
    
    return 0;
}
