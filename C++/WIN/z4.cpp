#define WIN32_LEAN_AND_MEAN
#define _WIN32_WINNT 0x0500
#include <windows.h>
 
class KeyBot
{
private:
    INPUT _buffer[1];
 
public:
    KeyBot();
    void KeyUp( char key );
    void KeyDown( char key );
    void KeyClick( char key );
};
 
KeyBot::KeyBot()
{
    _buffer->type = INPUT_KEYBOARD;
    _buffer->ki.wScan = 0;
    _buffer->ki.time = 0;
    _buffer->ki.dwExtraInfo = 0;
}
 
void KeyBot::KeyUp( char key )
{
    _buffer->ki.wVk = key;
    _buffer->ki.dwFlags = KEYEVENTF_KEYUP;
    SendInput( 1, _buffer, sizeof( INPUT ) );
}
 
void KeyBot::KeyDown( char key )
{
    _buffer->ki.wVk = key;
    _buffer->ki.dwFlags = 0;
    SendInput( 1, _buffer, sizeof( INPUT ) );
}
 
void KeyBot::KeyClick( char key )
{
    KeyDown( key );
    Sleep( 10 );
    KeyUp( key );
}
 
int main()
{
    KeyBot bot;
    
    bot.KeyDown( 0x57 ); //press and hold W
    Sleep( 1000 ); //wait 1000 ms
    bot.KeyUp( 0x57 ); //release W key 
 
    return 0;
}
